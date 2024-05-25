<?php 
include "includes/nav.admin.view.php";
include "includes/header.view.php";
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
    <div class="header bg-gradient-danger  pb-8 pt-md-8">
      <div class="container-fluid">
        <h2 class="mb-5 text-white">Stats Card</h2>
        <div class="header-body">
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body ">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Traffic</h5>
                      <a href="#"><span class="h2 font-weight-bold mb-0">897</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">New notifications</h5>
                      <a href="#"><span class="h2 font-weight-bold mb-0">356</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 3.48%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Documents</h5>
                      <a href="#"><span class="h2 font-weight-bold mb-0">924</span></a>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                    <span class="text-nowrap">Since last year</span>
                  </p>
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
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                    <span class="text-nowrap">Since last month</span>
                  </p>
                </div>
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
                  
                  <?php 
                  print_r($notifications); // Debug statement
                  if (!empty($notifications)) : ?>
                      <?php foreach ($notifications as $notification) : ?>
                          <div class="news-item">
                              <h6 class="news-label" style="background-color: #d7ecfb; padding: 5px;">Notification</h6>
                              <h6 class="news-title"><?= htmlspecialchars($notification['message']) ?></h6>
                          </div>
                          <hr>
                      <?php endforeach; ?>
                  <?php else : ?>
                      <p>No notifications available.</p>
                  <?php endif; ?>
              </div>
          </div>
      </div>

    </div>
  </div>
</body>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('myChart');
            
    function formatDate(date) {
      const month = date.getMonth() + 1;
      const day = date.getDate();
      return `${month.toString().padStart(2, '0')}/${day.toString().padStart(2, '0')}`;
    }
    const today = new Date();
        
    const labels = [];
    for (let i = 0; i < 10; i++) {
      const currentDate = new Date(today);
      currentDate.setDate(currentDate.getDate() + i); 
      labels.push(formatDate(currentDate));
    }
          
    new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Number of Users per day',
          data: [50, 19, 3, 5, 2, 3, 0, 21, 98, 28],
          borderWidth: 4,
          borderColor: 'rgba(54, 162, 235, 1)',
          backgroundColor: 'rgba(54, 162, 235, 0.2)',
          pointBackgroundColor: 'rgba(54, 162, 235, 1)',
          pointBorderColor: '#fff',
          pointHoverBackgroundColor: '#fff',
          pointHoverBorderColor: 'rgba(54, 162, 235, 1)',
          shadowOffsetX: 4,
          shadowOffsetY: 4,
          shadowBlur: 10,
          shadowColor: 'rgba(0, 0, 0, 0.5)',
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
            display: false
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
<script src="https://unpkg.com/bs-brain@2.0.4/components/charts/chart-1/assets/controller/chart-1.js"></script>
