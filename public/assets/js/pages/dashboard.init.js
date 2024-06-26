function getChartColorsArray(e) {
    if (null !== document.getElementById(e)) {
        var r = document.getElementById(e).getAttribute("data-colors");
        if (r)
            return (r = JSON.parse(r)).map(function (e) {
                var r = e.replace(" ", "");
                return -1 === r.indexOf(",")
                    ? getComputedStyle(
                          document.documentElement
                      ).getPropertyValue(r) || r
                    : 2 == (e = e.split(",")).length
                    ? "rgba(" +
                      getComputedStyle(
                          document.documentElement
                      ).getPropertyValue(e[0]) +
                      "," +
                      e[1] +
                      ")"
                    : r;
            });
        console.warn("data-colors Attribute not found on:", e);
    }
}
function ChartColorChange(r, o) {
    document.querySelectorAll(".theme-color").forEach(function (e) {
        e.addEventListener("click", function (e) {
            setTimeout(function () {
                var e = getChartColorsArray(o);
                r.options &&
                    (r.options.colors
                        ? (r.options.colors = e)
                        : r.options.lineColors
                        ? (r.options.lineColors = e)
                        : r.options.barColors && (r.options.barColors = e),
                    r.redraw());
            }, 0);
        });
    });
}
!(function (e) {
    "use strict";
    function r() {}
    (r.prototype.createBarChart = function (e, r, o, a, t, n) {
        ChartColorChange(
            Morris.Bar({
                element: e,
                data: r,
                xkey: o,
                ykeys: a,
                labels: t,
                gridLineColor: "rgba(108, 120, 151, 0.1)",
                gridTextColor: "#98a6ad",
                barSizeRatio: 0.2,
                resize: !0,
                hideHover: "auto",
                barColors: n,
            }),
            "morris-bar-example"
        );
    }),
        (r.prototype.createAreaChart = function (e, r, o, a, t, n, i, l) {
            ChartColorChange(
                Morris.Area({
                    element: e,
                    pointSize: 0,
                    lineWidth: 0,
                    data: a,
                    xkey: t,
                    ykeys: n,
                    labels: i,
                    resize: !0,
                    gridLineColor: "rgba(108, 120, 151, 0.1)",
                    hideHover: "auto",
                    lineColors: l,
                    fillOpacity: 0.6,
                    behaveLikeLine: !0,
                }),
                "morris-area-example"
            );
        }),
        (r.prototype.createDonutChart = function (e, r, o) {
            ChartColorChange(
                Morris.Donut({ element: e, data: r, resize: !0, colors: o }),
                "morris-donut-example"
            );
        }),
        (r.prototype.init = function () {
            var e = getChartColorsArray("morris-bar-example"),
                e =
                    (e &&
                        this.createBarChart(
                            "morris-bar-example",
                            [
                                { y: "2006", a: 100, b: 90 },
                                { y: "2007", a: 75, b: 65 },
                                { y: "2008", a: 50, b: 40 },
                                { y: "2009", a: 75, b: 65 },
                                { y: "2010", a: 50, b: 40 },
                                { y: "2011", a: 75, b: 65 },
                                { y: "2012", a: 100, b: 90 },
                                { y: "2013", a: 90, b: 75 },
                                { y: "2014", a: 75, b: 65 },
                                { y: "2015", a: 50, b: 40 },
                                { y: "2016", a: 75, b: 65 },
                                { y: "2017", a: 100, b: 90 },
                                { y: "2018", a: 90, b: 75 },
                            ],
                            "y",
                            ["a", "b"],
                            ["Series A", "Series B"],
                            e
                        ),
                    getChartColorsArray("morris-area-example")),
                e =
                    (e &&
                        this.createAreaChart(
                            "morris-area-example",
                            0,
                            0,
                            [
                                { y: "2007", a: 0, b: 0, c: 0 },
                                { y: "2008", a: 150, b: 45, c: 15 },
                                { y: "2009", a: 60, b: 150, c: 195 },
                                { y: "2010", a: 180, b: 36, c: 21 },
                                { y: "2011", a: 90, b: 60, c: 360 },
                                { y: "2012", a: 75, b: 240, c: 120 },
                                { y: "2013", a: 30, b: 30, c: 30 },
                            ],
                            "y",
                            ["a", "b", "c"],
                            ["Series A", "Series B", "Series C"],
                            e
                        ),
                    getChartColorsArray("morris-donut-example"));
            e &&
                this.createDonutChart(
                    "morris-donut-example",
                    [
                        { label: "Marketing", value: 12 },
                        { label: "Online", value: 42 },
                        { label: "Offline", value: 20 },
                    ],
                    e
                );
        }),
        (e.Dashboard = new r()),
        (e.Dashboard.Constructor = r);
})(window.jQuery),
    (function () {
        "use strict";
        window.jQuery.Dashboard.init();
    })();
