
_.addEvent(window, 'load', function () {
  _.loadScript('//www.google.com/jsapi', function () {
    google.load('visualization', '1.0', { 'callback': 'init_charts()', 'packages': ['corechart'] });
  });
});

_.addEvent(window, 'resize', function() {
  init_charts();
});

function init_charts() {

  var c = document.querySelector('.js-chart1'),
    data = new google.visualization.DataTable(),
    xhr = _.xhr();

  //_.cssClass.add(c, 'loading');
  xhr.open('GET', '/account/charts/products-by-category', true);
  xhr.send();

  _.addEvent(xhr, 'load', function() {
    var obj = JSON.parse(this.responseText);

    console.log(obj);

    for(var i = 0, len = obj.columns.length; i < len; i++) {
      data.addColumn(obj.columns[i][0], obj.columns[i][1]);
    }

    data.addRows(obj.rows);

    var options = {
      'title': obj.title,
      'width': '100%',
      'height': 400,
      fontName: 'Lato',
      titleTextStyle: {bold: false},
      colors: ['#60A1CC', '#28333F', '#C13534', '#355899', '#4EB05E']
    },
    chart = new google.visualization.PieChart(c);

    chart.draw(data, options);

    //_.cssClass.remove(c, 'loading');
  });

}
