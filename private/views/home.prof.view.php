<?php 
require('/xampp/htdocs/e-service/private/controllers/Login.php');
include "includes/nav.prof.view.php";
include "includes/header.view.php";
$loginController = new Login();
$lastSevenDaysData = $loginController->getLastSevenDaysData();
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
    div {
        font-family: 'Poppins', sans-serif;
    }
    .wrapper {
        margin: -50px 0 50px;
    }
</style>
<body>
<div class="main-content wrapper">
    <div class="header bg-gradient-danger pb-8 pt-md-8">
        <div class="container-fluid " style="margin-bottom: 50px;">
            <h2 class="mb-5 text-white">Stats Card</h2>
            <div class="header-body">
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                                        <a href="#"><span class="h2 font-weight-bold mb-0 text-danger">897</span></a>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow"></div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">New notifications</h5>
                                        <a href="#"><span class="h2 font-weight-bold mb-0 text-success">356</span></a>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow"></div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Documents</h5>
                                        <a href="#"><span class="h2 font-weight-bold mb-0 text-warning">924</span></a>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow"></div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Logins</h5>
                                        <a href="#"><span class="h2 font-weight-bold mb-0">49,65%</span></a>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow"></div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="row">
        <div class="col-md-9">
            <div class="card" style="height: 500px;">
                <canvas id="myChart" class="m-5" style="width: calc(100% - 10px); height: calc(100% - 10px);"></canvas>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card" style="height: 500px;">
                <div class="card-body">
                    <h5 class="card-title">Latest News</h5>
                    <div class="news-item">
                        <h6 class="news-label" style="background-color: #d7ecfb; padding: 5px;">News 1</h6>
                        <h6 class="news-title">Lorem Ipsum Dolor Sit Amet</h6>
                        <p class="news-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        <button class="btn btn-outline-primary btn-sm" style="color: blue;">Read More</button>
                    </div>
                    <hr>
                    <div class="news-item">
                        <h6 class="news-label" style="background-color: #d7ecfb; padding: 5px;">News 2</h6>
                        <h6 class="news-title">Consectetur Adipiscing Elit</h6>
                        <p class="news-content">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <button class="btn btn-outline-primary btn-sm" style="color: blue;">Read More</button>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('myChart').getContext('2d');
    
    // Parse the JSON data from PHP
    const dailyData = <?php echo $lastSevenDaysData; ?>;

    const labels = [];
    const data = dailyData;

    // Get the labels for the last 7 days
    for (let i = 6; i >= 0; i--) {
        const date = new Date();
        date.setDate(date.getDate() - i);
        labels.push(date.toISOString().split('T')[0]);
    }

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Number of Logins per Day',
                data: data,
                borderWidth: 4,
                borderColor: 'rgba(54, 162, 235, 1)',
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgba(54, 162, 235, 1)',
                tension: 0.5,
                fill: true
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: true
                },
                animation: {
                    duration: 2000, // 2 seconds
                    easing: 'easeInOutQuart' // smooth animation
                }
            }
        }
    });
});
</script>