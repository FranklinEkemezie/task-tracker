# Task Tracker

A Laravel + Blade task tracking UI with auth screens, dashboard analytics, task views, charts, toasts, and a full light/dark theme. This repo focuses on the frontend layer and reusable Blade components while keeping routes unguarded for quick previewing during development.

**Highlights**
- Auth screens (login, register, reset, verify)
- Dashboard overview with Chart.js visuals
- Task board, in-progress, and completed views
- Reusable Blade components for icons, buttons, dropdowns, toasts
- Dark mode with localStorage persistence
- Responsive layouts built with Tailwind

## Tech Stack
- Laravel
- Blade components
- Tailwind CSS (via Vite)
- Chart.js
- Docker + Laravel Sail

## Getting Started (Sail)

```bash
# from the project root
./vendor/bin/sail up -d
./vendor/bin/sail composer install
./vendor/bin/sail npm install
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate
./vendor/bin/sail npm run dev
```

If you prefer to run a single command shell inside Sail:

```bash
./vendor/bin/sail shell
```

Open the app in your browser (default Sail host):

```text
http://localhost
```

## Useful Commands

```bash
./vendor/bin/sail artisan
./vendor/bin/sail artisan migrate:fresh --seed
./vendor/bin/sail npm run dev
./vendor/bin/sail npm run build
```

## Routes (UI Preview)

```text
/                   -> welcome
/login              -> auth login
/register           -> auth register
/forgot-password    -> password reset request
/verify-email       -> email verification
/dashboard          -> dashboard overview
/tasks/board        -> task board
/tasks/in-progress  -> in progress tasks
/tasks/completed    -> completed tasks
```

## Project Structure (Frontend)

```text
resources/
  views/
    components/
      buttons/           # primary, outline, icon, theme toggle
      icons/             # svg icon components
      dropdown.blade.php
      toast.blade.php
      layouts/           # base, auth, app, task
    dashboard/           # overview and task pages
  js/
    modules/             # dropdown, theme-toggle, dashboard-charts, etc.
  css/
    app.css              # design tokens and dark overrides
```

## Design System and Themes
- Light and dark mode are controlled via a `dark` class on the `html` element.
- Theme state is stored in `localStorage` under the key `theme`.
- The toggle button lives in the user dropdown and updates `data-theme` for clarity.

## Charts
Dashboard charts are powered by Chart.js and initialized in:

```text
resources/js/modules/dashboard-charts.js
```

## Toasts
Toasts are rendered from a session `toasts` array in the base layout. Each toast can include:

```text
variant: success | danger | warning | info
title:   optional string
message: string
```

## Task Layout
Task pages share a common layout:

```text
resources/views/components/layouts/task-layout.blade.php
```

It includes the header, tabs, and a default "Create New Task" button on every task tab.

## Notes
- Routes are currently unguarded for UI previewing during development.
- Auth middleware can be re-enabled later as needed.

## License
MIT
