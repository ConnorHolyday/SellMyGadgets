
window.addEventListener('load', function () {
  _.loadScript('//www.google.com/jsapi', function () {
    google.load('visualization', '1.0', { 'callback': 'drawChart()', 'packages': ['corechart'] });
  });
}, false);

function drawChart() {

  var c = document.querySelector('.js-chart1'),
    data = new google.visualization.DataTable();

  data.addColumn('string', 'Topping');
  data.addColumn('number', 'Slices');
  data.addRows([
    ['Mushrooms', 3],
    ['Onions', 1],
    ['Olives', 1],
    ['Zucchini', 1],
    ['Pepperoni', 2]
  ]);

  var options = {
    'title': 'How Much Pizza I Ate Last Night',
    'width': 400,
    'height': 300
  },
  chart = new google.visualization.PieChart(c);

  chart.draw(data, options);
}
