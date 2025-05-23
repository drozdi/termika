document.addEventListener('DOMContentLoaded', function() {
        const timeElement = document.getElementById('current-time-display');
        if (!timeElement) return;

        // Функция форматирования времени
        function formatTime(date, format) {
            return format
                .replace(/H/g, date.getHours().toString().padStart(2, '0'))
                .replace(/i/g, date.getMinutes().toString().padStart(2, '0'))
                .replace(/s/g, date.getSeconds().toString().padStart(2, '0'));
        }

        // Обновление времени каждую секунду
        function updateTime() {
            const now = new Date();
            timeElement.textContent = formatTime(now, timeElement.dataset.timeFormat);
        }

        updateTime();
        setInterval(updateTime, 1000);
    });