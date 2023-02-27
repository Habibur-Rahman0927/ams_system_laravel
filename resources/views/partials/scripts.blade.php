<script src="{{ asset('assets/dashboard/js/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/chart.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/bootstrap.min.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="{{ asset('assets/dashboard/js/app.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/script.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/bootbox.min.js') }}"></script>
<script src="{{ asset('assets/dashboard/js/toastr.min.js') }}"></script>

<script>
    // Membership Reports Chart
    const ctx = document.getElementById("myChart").getContext("2d");
    let delayed;
    var gradient = ctx.createLinearGradient(0, 0, 0, 50);

    gradient.addColorStop(1, "rgba(71,101,246, 0.2)");
    gradient.addColorStop(0, "rgba(71,101,246,1)");

    const labels = ["Jun 1", "Jun 2", "Jun 3", "Jun 4", "Jun 5", "Jun 6", "Jun 7"];

    const data = {
        labels: labels,
        datasets: [
            {
                label: "Incomes",
                fill: true,
                backgroundColor: gradient,
                borderColor: "#4765f6",
                pointBackgroundColor: "#fff",
                tension: 0.4,
                data: [2, 10, 5, 15, 20, 30, 50],
            },
        ],
    };

    const config = {
        type: "line",
        data: data,
        options: {
            radius: 3,
            hitRadius: 30,
            hoverRadius: 8,
            animation: {
                onComplete: () => {
                    delayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === "data" && context.mode === "default" && !delayed) {
                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            },
            plugins: {
                legend: {
                    display: true,
                    position: "top",
                    align: "end",
                    labels: {
                        fontColor: "#fff",
                        fontSize: 12,
                        usePointStyle: true,
                        padding: 20,
                        boxWidth: 10,
                        usePointStyle: true,
                        pointStyle: "rectRounded",
                        pointRadius: 5,
                        pointBorderWidth: 2,
                    },
                },
            },
        },
    };

    const myChart = new Chart(ctx, config);

    // Active User Chart
    var ctxx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctxx, {
        type: "bar",
        data: {
            labels: ["M", "T", "W", "T", "F", "S", "S"],
            datasets: [
                {
                    label: "Users",
                    tension: 0.4,
                    borderWidth: 0,
                    borderRadius: 4,
                    borderSkipped: false,
                    backgroundColor: "#4765F6",
                    data: [50, 20, 10, 22, 50, 10, 40],
                    maxBarThickness: 6,
                },
            ],
        },
        options: {
            // responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                },
            },
            interaction: {
                intersect: false,
                mode: "index",
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: "#fff",
                    },
                    ticks: {
                        suggestedMin: 0,
                        suggestedMax: 500,
                        beginAtZero: true,
                        padding: 5,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: "normal",
                            lineHeight: 2,
                        },
                        color: "rgba(15, 45, 105, 1)",
                    },
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5],
                        color: "#fff",
                    },
                    ticks: {
                        display: true,
                        color: "rgba(15, 45, 105, .8)",
                        padding: 10,
                        font: {
                            size: 14,
                            weight: 300,
                            family: "Roboto",
                            style: "normal",
                            lineHeight: 2,
                        },
                    },
                },
            },
        },
    });


    // Active MembarShip Chart
    var ctxxx = document.getElementById("chart-cicle").getContext("2d");

    new Chart(ctxxx, {
        type: "doughnut",
        data: {
            labels: ["Active Membarship", "Inactive Membarship"],
            datasets: [
                {
                    label: "Users",
                    tension: 0.4,
                    borderWidth: 0,
                    borderSkipped: false,
                    backgroundColor: ["#fff", "#788ef9"],
                    data: [90, 50],
                    maxBarThickness: 5,
                },
            ],
        },
        options: {
            //
            maintainAspectRatio: false,
            cutout: 50,
            animation: {
                duration: 2000,
            },
            plugins: {
                legend: {
                    display: false,
                },
            },
            interaction: {
                intersect: false,
                mode: "index",
            },
        },
    });
</script>
