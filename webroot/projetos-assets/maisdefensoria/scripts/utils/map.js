const transparencyMetrics = [
  { transparency: "Sem transparência", color: "#EDF8FB" },
  { transparency: "Baixíssima transparência", color: "#B2E2E2" },
  { transparency: "Baixa transparência", color: "#66C2A4" },
  { transparency: "Média transparência", color: "#2CA25F" },
  { transparency: "Alta transparência", color: "#006D2C" },
];

// Código JavaScript usando D3.js para desenhar um mapa com todos os estados do Brasil
const responsive = (big, small) => {
  return window.innerWidth > 550 ? big : small;
};

var width = responsive(400, window.innerWidth - 35);
var height = width;
var scale = width * 1.372;

const createMap = (selector, dataType) => {
  var svg = d3
    .select(selector)
    .append("svg")
    .attr("width", width)
    .attr("height", height);

  var projection = d3
    .geoMercator()
    .center([-55.6, -14])
    .scale(scale)
    .translate([width / 2, height / 2]);

  var path = d3.geoPath().projection(projection);

  var tooltip = d3
    .select(selector)
    .append("div")
    .attr("class", "graph-tooltip")
    .style("opacity", 0);

  d3.json("./data/brasil.json").then(function (data) {
    svg
      .selectAll("path")
      .data(data.features)
      .enter()
      .append("path")
      .attr("d", path)
      .style("fill", function (d) {
        return transparencyMetrics[d.properties[dataType]].color;
      })
      .style("stroke", "black")
      .style("stroke-width", 0.5)
      .on("mousemove", function (event, d) {
        const coord = event;
        let [x, y] = d3.pointer(coord);

        tooltip.transition().duration(200).style("opacity", 0.9);
        tooltip
          .html(
            d.properties.NOME_UF +
              ": " +
              transparencyMetrics[d.properties[dataType]].transparency
          )
          .style("left", x - 70 + "px")
          .style("top", y - 50 + "px")
          .style("font-size", `${responsive(14, 12)}px`);
      })
      .on("mouseout", function () {
        tooltip.transition().duration(200).style("opacity", 0);
      });

    svg
      .selectAll(".state-label")
      .data(data.features)
      .enter()
      .append("text")
      .style("user-select", "none")
      .attr("class", "state-label")
      .attr("transform", function (d) {
        var center = path.centroid(d);
        center[1] += 4;
        center[0] += 3;
        return "translate(" + center + ")";
      })
      .text(function (d) {
        return d.properties.UF;
      })
      .style("pointer-events", "none")
      .style("font-weight", "semi-bold")
      .style("font-size", `${responsive(12, 10)}px`);

    var legend = svg
      .selectAll(".legend")
      .data(transparencyMetrics)
      .enter()
      .append("g")
      .attr("class", "legend")
      .attr("transform", function (d, i) {
        var legendX = width - responsive(395, 340);
        var legendY = height - 135 + i * 25;
        return "translate(" + legendX + "," + legendY + ")";
      });

    legend
      .append("rect")
      .attr("width", 18)
      .attr("height", 18)
      .attr("rx", 4)
      .attr("stroke", "black")
      .attr("stroke-width", 0.8)
      .style("fill", function (d) {
        return d.color;
      });

    legend
      .append("text")
      .attr("x", 24)
      .attr("y", 9)
      .attr("dy", ".35em")
      .text(function (d) {
        return d.transparency;
      })
      .style("font-size", `${responsive(14, 10)}px`)
      .style("font-weight", "600")
      .style("user-select", "none");
  });
};

createMap("#dataviz", "AV1");
createMap("#dataviz2", "AV2");
