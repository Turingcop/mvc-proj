/** globals: Chart, diceData, handData */

Chart.defaults.font.size = 16;
const canvas = document.getElementById('diceChart');
const ctx = canvas.getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Ettor", "Tvåor", "Treor", "Fyror", "Femmor", "Sexor"],
        datasets: [{
            data: diceData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        layout: {
            padding: 10
        },
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            },
        }
    }
});

const handcanvas = document.getElementById('handChart');
const ctx2 = handcanvas.getContext('2d');
new Chart(ctx2, {
    type: 'doughnut',
    data: {
        labels: ["Ettor", "Tvåor", "Treor", "Fyror", "Femmor", "Sexor", "Par", "Tvåpar", "Tretal", "Fyrtal", "Kåk", "Liten stege", "Stor stege", "Chans", "Yatzy"],
        datasets: [{
            data: handData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
        }]
    },
    options: {
        layout: {
            padding: 10
        },
        plugins: {
            legend: {
                display: false
            }
        },
    }
});