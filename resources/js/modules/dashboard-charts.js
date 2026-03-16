import Chart from 'chart.js/auto';

function initDashboardCharts() {
    const dailyGoalsCtx = document.getElementById('dailyGoalsChart');
    const weeklyCtx = document.getElementById('weeklyPerformanceChart');

    if (!dailyGoalsCtx && !weeklyCtx) {
        return;
    }

    const styles = getComputedStyle(document.documentElement);
    const brandColor = styles.getPropertyValue('--color-brand-500').trim() || '#1a73e8';
    const slate200 = styles.getPropertyValue('--color-slate-200').trim() || '#e2e8f0';
    const slate400 = styles.getPropertyValue('--color-slate-400').trim() || '#94a3b8';

    if (dailyGoalsCtx) {
        new Chart(dailyGoalsCtx, {
            type: 'doughnut',
            data: {
                labels: ['Done', 'Remaining'],
                datasets: [{
                    data: [75, 25],
                    backgroundColor: [brandColor, slate200],
                    borderWidth: 0,
                }],
            },
            options: {
                cutout: '70%',
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: true },
                },
            },
        });
    }

    if (weeklyCtx) {
        new Chart(weeklyCtx, {
            type: 'bar',
            data: {
                labels: ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'],
                datasets: [{
                    data: [42, 58, 40, 75, 50, 32, 68],
                    backgroundColor: brandColor,
                    borderRadius: 12,
                    barThickness: 14,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { color: slate400, font: { size: 11 } },
                    },
                    y: {
                        display: false,
                        grid: { display: false },
                    },
                },
                plugins: {
                    legend: { display: false },
                    tooltip: { enabled: true },
                },
            },
        });
    }
}

document.addEventListener('DOMContentLoaded', initDashboardCharts);
