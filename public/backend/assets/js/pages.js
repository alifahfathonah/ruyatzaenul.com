$(function () {


    // Switchery toggles
    // ------------------------------

    var switches = Array.prototype.slice.call(document.querySelectorAll('.switch'));
    switches.forEach(function (html) {
        var switchery = new Switchery(html, { color: '#4CAF50' });
    });
    // Bar charts with random data
    // ------------------------------

    // Initialize charts
    generateBarChart("#hours-available-bars", 24, 40, true, "elastic", 1200, 50, "#EC407A", "hours");
    generateBarChart("#goal-bars", 24, 40, true, "elastic", 1200, 50, "#5C6BC0", "goal");
    generateBarChart("#members-online", 24, 50, true, "elastic", 1200, 50, "rgba(255,255,255,0.5)", "members");

    // Chart setup
    function generateBarChart(element, barQty, height, animate, easing, duration, delay, color, tooltip) {


        // Basic setup
        // ------------------------------

        // Add data set
        var bardata = [];
        for (var i = 0; i < barQty; i++) {
            bardata.push(Math.round(Math.random() * 10) + 10)
        }

        // Main variables
        var d3Container = d3.select(element),
            width = 100;



        // Construct scales
        // ------------------------------

        // Horizontal
        var x = d3.scale.ordinal()
            .rangeBands([0, width], 0.3)

        // Vertical
        var y = d3.scale.linear()
            .range([0, height]);



        // Set input domains
        // ------------------------------

        // Horizontal
        x.domain(d3.range(0, bardata.length))

        // Vertical
        y.domain([0, d3.max(bardata)])



        // Create chart
        // ------------------------------

        // Add svg element
        var container = d3Container.append('svg');

        // Add SVG group
        var svg = container
            .attr('width', width)
            .attr('height', height)
            .append('g');



        //
        // Append chart elements
        //

        // Bars
        var bars = svg.selectAll('rect')
            .data(bardata)
            .enter()
            .append('rect')
            .attr('class', 'd3-random-bars')
            .attr('width', x.rangeBand())
            .attr('x', function (d, i) {
                return x(i);
            })
            .style('fill', color);



        // Tooltip
        // ------------------------------

        var tip = d3.tip()
            .attr('class', 'd3-tip')
            .offset([-10, 0]);

        // Show and hide
        if (tooltip == "hours" || tooltip == "goal" || tooltip == "members") {
            bars.call(tip)
                .on('mouseover', tip.show)
                .on('mouseout', tip.hide);
        }

        // Daily meetings tooltip content
        if (tooltip == "hours") {
            tip.html(function (d, i) {
                return "<div class='text-center'>" +
                    "<h6 class='no-margin'>" + d + "</h6>" +
                    "<span class='text-size-small'>meetings</span>" +
                    "<div class='text-size-small'>" + i + ":00" + "</div>" +
                    "</div>"
            });
        }

        // Statements tooltip content
        if (tooltip == "goal") {
            tip.html(function (d, i) {
                return "<div class='text-center'>" +
                    "<h6 class='no-margin'>" + d + "</h6>" +
                    "<span class='text-size-small'>statements</span>" +
                    "<div class='text-size-small'>" + i + ":00" + "</div>" +
                    "</div>"
            });
        }

        // Online members tooltip content
        if (tooltip == "members") {
            tip.html(function (d, i) {
                return "<div class='text-center'>" +
                    "<h6 class='no-margin'>" + d + "0" + "</h6>" +
                    "<span class='text-size-small'>members</span>" +
                    "<div class='text-size-small'>" + i + ":00" + "</div>" +
                    "</div>"
            });
        }



        // Bar loading animation
        // ------------------------------

        // Choose between animated or static
        if (animate) {
            withAnimation();
        } else {
            withoutAnimation();
        }

        // Animate on load
        function withAnimation() {
            bars
                .attr('height', 0)
                .attr('y', height)
                .transition()
                .attr('height', function (d) {
                    return y(d);
                })
                .attr('y', function (d) {
                    return height - y(d);
                })
                .delay(function (d, i) {
                    return i * delay;
                })
                .duration(duration)
                .ease(easing);
        }

        // Load without animateion
        function withoutAnimation() {
            bars
                .attr('height', function (d) {
                    return y(d);
                })
                .attr('y', function (d) {
                    return height - y(d);
                })
        }



        // Resize chart
        // ------------------------------

        // Call function on window resize
        $(window).on('resize', barsResize);

        // Call function on sidebar width change
        $(document).on('click', '.sidebar-control', barsResize);

        // Resize function
        // 
        // Since D3 doesn't support SVG resize by default,
        // we need to manually specify parts of the graph that need to 
        // be updated on window resize
        function barsResize() {

            // Layout variables
            width = d3Container.node().getBoundingClientRect().width;


            // Layout
            // -------------------------

            // Main svg width
            container.attr("width", width);

            // Width of appended group
            svg.attr("width", width);

            // Horizontal range
            x.rangeBands([0, width], 0.3);


            // Chart elements
            // -------------------------

            // Bars
            svg.selectAll('.d3-random-bars')
                .attr('width', x.rangeBand())
                .attr('x', function (d, i) {
                    return x(i);
                });
        }
    }
});
