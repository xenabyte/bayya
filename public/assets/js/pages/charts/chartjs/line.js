"use strict";!function(){var o={type:"line",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"My First dataset",backgroundColor:window.chartColors.red,borderColor:window.chartColors.red,data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],fill:!1},{label:"My Second dataset",fill:!1,backgroundColor:window.chartColors.blue,borderColor:window.chartColors.blue,data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]}]},options:{responsive:!0,title:{display:!0,text:"Chart.js Line Chart"},tooltips:{mode:"index",intersect:!1},hover:{mode:"nearest",intersect:!0},scales:{xAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Month"}}],yAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Value"}}]}}};window.onload=function(){var a=document.getElementById("line-1").getContext("2d");window.myLine=new Chart(a,o)}}(),function(){var a={labels:["January","February","March","April","May","June","July"],datasets:[{label:"My First dataset",borderColor:window.chartColors.red,backgroundColor:window.chartColors.red,fill:!1,data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],yAxisID:"y-axis-1"},{label:"My Second dataset",borderColor:window.chartColors.blue,backgroundColor:window.chartColors.blue,fill:!1,data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],yAxisID:"y-axis-2"}]},o=document.getElementById("line-2").getContext("2d");window.myLine=Chart.Line(o,{data:a,options:{responsive:!0,hoverMode:"index",stacked:!1,title:{display:!0,text:"Chart.js Line Chart - Multi Axis"},scales:{yAxes:[{type:"linear",display:!0,position:"left",id:"y-axis-1"},{type:"linear",display:!0,position:"right",id:"y-axis-2",gridLines:{drawOnChartArea:!1}}]}}})}(),function(){var i=document.querySelector("#line-stepped"),d=[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()];[{steppedLine:!1,label:"No Step Interpolation",color:window.chartColors.red},{steppedLine:!0,label:"Step Before Interpolation",color:window.chartColors.green},{steppedLine:"before",label:"Step Before Interpolation",color:window.chartColors.green},{steppedLine:"after",label:"Step After Interpolation",color:window.chartColors.purple},{steppedLine:"middle",label:"Step Middle Interpolation",color:window.chartColors.blue}].forEach(function(a){var o=document.createElement("div");o.classList.add("chart-container"),o.classList.add("col-md-6");var r=document.createElement("canvas");o.appendChild(r),i.appendChild(o);var n,e,t=r.getContext("2d"),l=(e=d,{type:"line",data:{labels:["Day 1","Day 2","Day 3","Day 4","Day 5","Day 6"],datasets:[{label:"steppedLine: "+(n=a).steppedLine,steppedLine:n.steppedLine,data:e,borderColor:n.color,fill:!1}]},options:{responsive:!0,title:{display:!0,text:n.label}}});new Chart(t,l)})}(),function(){var a=[0,20,20,60,60,120,NaN,180,120,125,105,110,170],o={type:"line",data:{labels:["0","1","2","3","4","5","6","7","8","9","10","11","12"],datasets:[{label:"Cubic interpolation (monotone)",data:a,borderColor:window.chartColors.red,backgroundColor:"rgba(0, 0, 0, 0)",fill:!1,cubicInterpolationMode:"monotone"},{label:"Cubic interpolation (default)",data:a,borderColor:window.chartColors.blue,backgroundColor:"rgba(0, 0, 0, 0)",fill:!1},{label:"Linear interpolation",data:a,borderColor:window.chartColors.green,backgroundColor:"rgba(0, 0, 0, 0)",fill:!1,lineTension:0}]},options:{responsive:!0,title:{display:!0,text:"Chart.js Line Chart - Cubic interpolation mode"},tooltips:{mode:"index"},scales:{xAxes:[{display:!0,scaleLabel:{display:!0}}],yAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Value"},ticks:{suggestedMin:-10,suggestedMax:200}}]}}},r=document.getElementById("line-3").getContext("2d");window.myLine=new Chart(r,o)}(),function(){var a={type:"line",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"Unfilled",fill:!1,backgroundColor:window.chartColors.blue,borderColor:window.chartColors.blue,data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]},{label:"Dashed",fill:!1,backgroundColor:window.chartColors.green,borderColor:window.chartColors.green,borderDash:[5,5],data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]},{label:"Filled",backgroundColor:window.chartColors.red,borderColor:window.chartColors.red,data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],fill:!0}]},options:{responsive:!0,title:{display:!0,text:"Chart.js Line Chart"},tooltips:{mode:"index",intersect:!1},hover:{mode:"nearest",intersect:!0},scales:{xAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Month"}}],yAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Value"}}]}}},o=document.getElementById("line-4").getContext("2d");window.myLine=new Chart(o,a)}(),function(){var l=document.querySelector("#line-6");["circle","triangle","rect","rectRounded","rectRot","cross","crossRot","star","line","dash"].forEach(function(a){var o=document.createElement("div");o.classList.add("chart-container"),o.classList.add("col-md-6");var r=document.createElement("canvas");o.appendChild(r),l.appendChild(o);var n,e=r.getContext("2d"),t=(n=a,{type:"line",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"My First dataset",backgroundColor:window.chartColors.red,borderColor:window.chartColors.red,data:[10,23,5,99,67,43,0],fill:!1,pointRadius:10,pointHoverRadius:15,showLine:!1}]},options:{responsive:!0,title:{display:!0,text:"Point Style: "+n},legend:{display:!1},elements:{point:{pointStyle:n}}}});new Chart(e,t)})}(),function(){var a={type:"line",data:{labels:["January","February","March","April","May","June","July"],datasets:[{label:"dataset - big points",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],backgroundColor:window.chartColors.red,borderColor:window.chartColors.red,fill:!1,borderDash:[5,5],pointRadius:15,pointHoverRadius:10},{label:"dataset - individual point sizes",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],backgroundColor:window.chartColors.blue,borderColor:window.chartColors.blue,fill:!1,borderDash:[5,5],pointRadius:[2,4,6,18,0,12,20]},{label:"dataset - large pointHoverRadius",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],backgroundColor:window.chartColors.green,borderColor:window.chartColors.green,fill:!1,pointHoverRadius:30},{label:"dataset - large pointHitRadius",data:[randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()],backgroundColor:window.chartColors.yellow,borderColor:window.chartColors.yellow,fill:!1,pointHitRadius:20}]},options:{responsive:!0,legend:{position:"bottom"},hover:{mode:"index"},scales:{xAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Month"}}],yAxes:[{display:!0,scaleLabel:{display:!0,labelString:"Value"}}]},title:{display:!0,text:"Chart.js Line Chart - Different point sizes"}}},o=document.getElementById("line-5").getContext("2d");window.myLine=new Chart(o,a)}();