<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Settings</title>
    <link rel="stylesheet" href="{{ asset('css/admin.settings.css') }}">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-Nnl8FfCgpiYfyXIdrH2iGh/QFwFpfjF9eXW+9BlV2MOoQQc/7i+ZLCxIz/ZIhVlL/A9/FqzxYlu6y0yfFYFgUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500&display=swap" rel="stylesheet" />
</head>
<body>
<div class="page d-flex">
  <div class="content w-full">
    <!-- Include the header and sidebar components in the same container -->
    <div class="header-sidebar-container">
      <!-- Include the header component -->
      @include('components.header')

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Include the sidebar component -->
        @include('components.sidebar')
      </div>
    </div>
        <!-- End Head -->
        <div class="main-content">
        <h1 class="p-relative" style="color: #333; font-weight: bold; margin-left: 20px;">Settings</h1>
        <div class="settings-page m-20 d-grid gap-20">
          <!-- Start Settings Box -->
          <div class="site-control-container">
    <div class="p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10">Site Control</h2>
        <p class="mt-0 mb-20 c-grey fs-15">Control The Website If There Is Maintenance.</p>
        <div class="mb-15 between-flex">
            <div class="flex-container">
                <div>
                    <div class="text-container">
                        <span>Website Control: Open/Close Website And Type The Reason</span>
                    </div>
                </div>
                <div>
                    <label>
                        <input class="toggle-checkbox" type="checkbox" checked />
                        <div class="toggle-switch"></div>
                    </label>
                </div>
            </div>
        </div>
        <textarea class="close-message p-10 rad-6 d-block w-full" placeholder="Close Message Content"></textarea>
    </div>
</div>

          <!-- End Settings Box -->
          <div class="general-info-container">
    <h2 class="mt-0 mb-10">General Info</h2>
    <p class="mt-0 mb-20 c-grey fs-15">General Information About Your Account:</p>
    <div class="mb-15">
        <label class="fs-14 c-grey d-block mb-10" for="first">First Name</label>
        <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            type="text"
            id="first"
            placeholder="First Name"
        />
    </div>
    <div class="mb-15">
        <label class="fs-14 c-grey d-block mb-5" for="last">Last Name</label>
        <input
            class="b-none border-ccc p-10 rad-6 d-block w-full"
            id="last"
            type="text"
            placeholder="Last Name"
        />
    </div>
    <div>
        <label class="fs-14 c-grey d-block mb-5" for="email">Email</label>
        <input
            class="email b-none border-ccc p-10 rad-6 w-full mr-10"
            id="email"
            type="email"
            value="example@gmail.com"
            disabled
        />
        <a class="email-change-button" href="#">Change</a>
        
    </div>
</div>

          <!-- End Settings Box -->
          <div class="security-container">
    <div class="p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10">Security Info</h2>
        <p class="mt-0 mb-20 c-grey fs-15">Security Information About Your Account:</p>
        <div class="sec-box mb-15 between-flex">
            <div class="flex-container">
                <div>
                    <span><b>Password:</b> Last Change On 25/10/2021</span>
                </div>
                <div class="button-container">
                    <a class="button bg-gradient c-white btn-shape" href="#">
                        <span>Change</span>
                        <i class="fas fa-pen"></i> 
                    </a>
                </div>
            </div>
        </div>
        <div class="sec-box mb-15 between-flex">
            <div class="two-factor-container">
                <div>
                    <span><b>Two-Factor Authentication:</b> Enable/Disable The Feature</span>
                </div>
                <label class="toggle-label">
                    <input class="toggle-checkbox" type="checkbox" checked />
                    <div class="toggle-switch"></div>
                </label>
            </div>
        </div>
        <div class="sec-box between-flex devices-container">
            <div class="devices-container">
                <div>
                    <span><b>Devices:</b> Check The Login Devices List</span>
                </div>
                <a class="custom-button" href="#">
                    <i class="fas fa-mobile-alt"></i> 
                    Devices
                </a>
            </div>
        </div>
    </div>
</div>


          <!-- End Settings Box -->
          <div class="social-info-container">
    <!-- Start Settings Box -->
    <!-- Start Settings Box -->
<div class="social-boxes p-20 bg-white rad-10">
    <h2 class="mt-0 mb-10">Social Info</h2>
    <p class="mt-0 mb-20 c-grey fs-15">Social Media Information:</p>
    <div class="Twitter">
        <i class="fa-brands fa-twitter center-flex c-grey"></i>
        <input class="w-full" type="text" placeholder="Twitter Username" />
    </div>
    <div class="Facebook">
        <i class="fa-brands fa-facebook-f center-flex c-grey"></i>
        <input class="w-full" type="text" placeholder="Facebook Username" />
    </div>
    <div class="Linkedin">
        <i class="fa-brands fa-linkedin center-flex c-grey"></i>
        <input class="w-full" type="text" placeholder="Linkedin Username" />
    </div>
    <div class="Youtube">
        <i class="fa-brands fa-youtube center-flex c-grey"></i>
        <input class="w-full" type="text" placeholder="Youtube Username" />
    </div>
</div>
<!-- End Settings Box -->

</div>

    <!-- End Settings Box -->
</div>

<div class="backup-container">
    <!-- Start Settings Box -->
    <div class="backup-control p-20 bg-white rad-10">
        <h2 class="mt-0 mb-10">Backup Manager</h2>
        <p class="mt-0 mb-20 c-grey fs-15">Control Backup Time And Location:</p>
        <div class="radio-container">
    <!-- Daily Radio Button -->
    <div class="date d-flex align-center mb-15">
        <input type="radio" name="time" id="daily" checked />
        <label for="daily">Daily</label>
    </div>
    <!-- Weekly Radio Button -->
    <div class="date d-flex align-center mb-15">
        <input type="radio" name="time" id="weekly" />
        <label for="weekly">Weekly</label>
    </div>
    <!-- Monthly Radio Button -->
    <div class="date d-flex align-center mb-15">
        <input type="radio" name="time" id="monthly" />
        <label for="monthly">Monthly</label>
    </div>
</div>

<div class="server-selection-container">
    <!-- Server Selection -->
    <div class="servers d-flex align-center txt-c">
        <input type="radio" name="servers" id="server-one" />
        <div class="server mb-15 rad-10 w-full">
            <label class="d-block m-15" for="server-one">
                <i class="fas fa-network-wired"></i>
                Megaman
            </label>
        </div>
        
        <input type="radio" name="servers" id="server-two" checked />
        <div class="server mb-15 rad-10 w-full">
            <label class="d-block m-15" for="server-two">
                <i class="fas fa-table"></i>
                Zero
            </label>
        </div>
        
        <input type="radio" name="servers" id="server-three" />
        <div class="server mb-15 rad-10 w-full">
            <label class="d-block m-15" for="server-three">
                <i class="fas fa-database"></i>
                Sigma
            </label>
        </div>
    </div>
</div>

    <!-- End Settings Box -->
</div>

        </div>
      </div>
    </div>
  </body>
</html>