import Chart from 'chart.js/auto';

  const cotas = Array.isArray(window.cotas) ? window.cotas : [0,0,0];
  const data = cotas.map(v => Number(v || 0));
const ctx = document.getElementById('meuGrafico');

    new Chart(ctx, {
        type: 'doughnut', // tipos: 'bar', 'line', 'pie', etc.
        data: {
            labels: ['Antes de Ontem', 'Ontem', 'Hoje'],
            datasets: [{
                label: 'Cotas',
                data: data,
                borderWidth: 1,
                backgroundColor: [
         'rgba(54, 162, 235, 0.5)', // cor de preenchimento
        'rgba(255, 99, 132, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)'],
                borderColor: 'red'
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

