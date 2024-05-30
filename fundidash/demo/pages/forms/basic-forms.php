<?php
@include('./config.php');
session_start();
$logid = $_SESSION['fundi_id'];
$collect = "SELECT * FROM fundis WHERE id ='$logid'";
$result = mysqli_query($conn,$collect);
  $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bookings</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../../assets/css/demo/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../../assets/images/favicon.png" />
</head>
<body>
<script src="../assets/js/preloader.js"></script>
  <div class="body-wrapper">
    <!-- partial:../../partials/_sidebar.html -->
    <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
      <div class="mdc-drawer__header">
        <a href="../../index.html" class="brand-logo">
          <img src="../../../assets/images/toplog.png" width="60" height="60" style="border-radius:50%" alt="logo">
        </a>
      </div>
      <div class="mdc-drawer__content">
        <div class="user-info">
          <p class="name"><?php echo $_SESSION['fundi_name']; ?></p>
          <p class="email"><?php echo $_SESSION['fundi_email']; ?></p>
        </div>
        <div class="mdc-list-group">
          <nav class="mdc-list mdc-drawer-menu">
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../index.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">home</i>
                Dashboard
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="viewbookings.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">track_changes</i>
                Bookings
              </a>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-expansion-panel-link" href="#" data-toggle="expansionPanel" data-target="ui-sub-menu">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">person</i>
                View & Update
                <i class="mdc-drawer-arrow material-icons">chevron_right</i>
              </a>
              <div class="mdc-expansion-panel" id="ui-sub-menu">
                <nav class="mdc-list mdc-drawer-submenu">
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/forms/viewfundi.php">
                      My Account
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="../../pages/forms/updatefundi.php">
                      Update
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="viewfundis.php">
                      View Fundis
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="viewclients.php">
                      View Clients
                    </a>
                  </div>
                  <div class="mdc-list-item mdc-drawer-item">
                    <a class="mdc-drawer-link" href="viewbookings.php">
                      View Bookings
                    </a>
                  </div>
                </nav>
              </div>
            </div>
            <div class="mdc-list-item mdc-drawer-item">
              <a class="mdc-drawer-link" href="../../pages/tables/basic-tables.php">
                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon" aria-hidden="true">grid_on</i>
                Reports
              </a>
            </div>
            
            
            
          </nav>
        </div>
        <div class="profile-actions">
          <a href="javascript:;">Settings</a>
          <span class="divider"></span>
          <a href="logout.php">Logout</a>
        </div>
        
    </aside>
    <!-- partial -->

    <div class="main-wrapper mdc-drawer-app-content">
      <!-- partial:../../partials/_navbar.html -->
      <header class="mdc-top-app-bar">
        <div class="mdc-top-app-bar__row">
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
            <button class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
            <span class="mdc-top-app-bar__title">Greetings <?php echo $_SESSION['fundi_name']; ?></span>
            <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
              <i class="material-icons mdc-text-field__icon">search</i>
              <input class="mdc-text-field__input" id="text-field-hero-input">
              <div class="mdc-notched-outline">
                <div class="mdc-notched-outline__leading"></div>
                <div class="mdc-notched-outline__notch">
                  <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
                </div>
                <div class="mdc-notched-outline__trailing"></div>
              </div>
            </div>
          </div>
          <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
            <div class="menu-button-container menu-profile d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <span class="d-flex align-items-center">
                  <span class="figure">
                    <img src="images/<?=$row['userimage']; ?>" style="border-radius: 50%;width: 25px;height: 25px;" alt="user" class="user">
                  </span>
                  <span class="user-name"><?php echo $_SESSION['fundi_name']; ?></span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-account-edit-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Edit profile</h6>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-settings-outline text-primary"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Logout</h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="divider d-none d-md-block"></div>
            <div class="menu-button-container d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-settings"></i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-alert-circle-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Settings</h6>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-progress-download text-primary"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Update</h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
            <div class="menu-button-container">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-bell"></i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon">
                      <i class="mdi mdi-email-outline"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">You received a new message</h6>
                      <small class="text-muted"> 6 min ago </small>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon">
                      <i class="mdi mdi-account-outline"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">New user registered</h6>
                      <small class="text-muted"> 15 min ago </small>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon">
                      <i class="mdi mdi-alert-circle-outline"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">System Alert</h6>
                      <small class="text-muted"> 2 days ago </small>
                    </div>
                  </li> 
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon">
                      <i class="mdi mdi-update"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">You have a new update</h6>
                      <small class="text-muted"> 3 days ago </small>
                    </div>
                  </li> 
                </ul>
              </div>
            </div>
            <div class="menu-button-container">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-email"></i>
                <span class="count-indicator">
                  <span class="count">3</span>
                </span>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <h6 class="title"><i class="mdi mdi-email-outline mr-2 tx-16"></i> Messages</h6>
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail">
                      <img src="../../../assets/images/faces/face4.jpg" alt="user">
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Mark send you a message</h6>
                      <small class="text-muted"> 1 Minutes ago </small>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail">
                      <img src="../../../assets/images/faces/face2.jpg" alt="user">
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Cregh send you a message</h6>
                      <small class="text-muted"> 15 Minutes ago </small>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail">
                      <img src="../../../assets/images/faces/face3.jpg" alt="user">
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Profile picture updated</h6>
                      <small class="text-muted"> 18 Minutes ago </small>
                    </div>
                  </li>                
                </ul>
              </div>
            </div>
            <div class="menu-button-container d-none d-md-block">
              <button class="mdc-button mdc-menu-button">
                <i class="mdi mdi-arrow-down-bold-box"></i>
              </button>
              <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-lock-outline text-primary"></i>
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Lock screen</h6>
                    </div>
                  </li>
                  <li class="mdc-list-item" role="menuitem">
                    <div class="item-thumbnail item-thumbnail-icon-only">
                      <i class="mdi mdi-logout-variant text-primary"></i>                      
                    </div>
                    <div class="item-content d-flex align-items-start flex-column justify-content-center">
                      <h6 class="item-subject font-weight-normal">Logout</h6>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- partial -->
      <div class="page-wrapper mdc-toolbar-fixed-adjust">
        <main class="content-wrapper">
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-6-desktop stretch-card">
                <div class="mdc-card">
                  <h6 class="card-title">Switch</h6>
                  <div class="template-demo">
                    <div class="mdc-switch" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch">
                        </div>
                      </div>
                    </div>
                    <div class="mdc-switch mdc-switch--checked" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" checked>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-switch mdc-switch--disabled" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch">
                        </div>
                      </div>
                    </div>
                    <div class="mdc-switch mdc-switch--secondary" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" checked>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-switch mdc-switch--success" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" checked>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-switch mdc-switch--info" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" checked>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-switch mdc-switch--warning" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" checked>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-switch mdc-switch--light" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" checked>
                        </div>
                      </div>
                    </div>
                    <div class="mdc-switch mdc-switch--dark" data-mdc-auto-init="MDCSwitch">
                      <div class="mdc-switch__track"></div>
                      <div class="mdc-switch__thumb-underlay">
                        <div class="mdc-switch__thumb">
                            <input type="checkbox" id="basic-switch" class="mdc-switch__native-control" role="switch" checked>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="mdc-layout-grid__cell--span-4 mdc-layout-grid__cell--span-6-desktop stretch-card">
                <div class="mdc-card">
                  <h6 class="card-title">Select Menu</h6>
                  <div class="template-demo">
                    <div class="mdc-select demo-width-class" data-mdc-auto-init="MDCSelect">
                      <input type="hidden" name="enhanced-select">
                      <i class="mdc-select__dropdown-icon"></i>
                      <div class="mdc-select__selected-text"></div>
                      <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                        <ul class="mdc-list">
                          <li class="mdc-list-item mdc-list-item--selected" data-value="" aria-selected="true">
                          </li>
                          <li class="mdc-list-item" data-value="grains">
                            Bread, Cereal, Rice, and Pasta
                          </li>
                          <li class="mdc-list-item" data-value="vegetables">
                            Vegetables
                          </li>
                          <li class="mdc-list-item" data-value="fruit">
                            Fruit
                          </li>
                        </ul>
                      </div>
                      <span class="mdc-floating-label">Pick a Food Group</span>
                      <div class="mdc-line-ripple"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <h6 class="card-title">Text Field</h6>
                  <div class="template-demo">
                    <div class="mdc-layout-grid__inner">
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field">
                          <input class="mdc-text-field__input" id="text-field-hero-input">
                          <div class="mdc-line-ripple"></div>
                          <label for="text-field-hero-input" class="mdc-floating-label">Name</label>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined">
                          <input class="mdc-text-field__input" id="text-field-hero-input">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Name</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon">
                          <i class="material-icons mdc-text-field__icon">favorite</i>
                          <input class="mdc-text-field__input" id="text-field-hero-input">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Name</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                      <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-trailing-icon">
                          <i class="material-icons mdc-text-field__icon">visibility</i>
                          <input class="mdc-text-field__input" id="text-field-hero-input">
                          <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                              <label for="text-field-hero-input" class="mdc-floating-label">Name</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <h6 class="card-title">Checkbox</h6>
                  <div class="template-demo">
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox">
                        <input type="checkbox"
                                class="mdc-checkbox__native-control"
                                id="checkbox-1"/>
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="checkbox-1">Default</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--disabled">
                        <input type="checkbox"
                                id="basic-disabled-checkbox"
                                class="mdc-checkbox__native-control"
                                disabled />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label">Disabled</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox">
                        <input type="checkbox"
                                id="basic-disabled-checkbox"
                                class="mdc-checkbox__native-control"
                                checked />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label">Primary Checked</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--secondary">
                        <input type="checkbox"
                                id="basic-disabled-checkbox"
                                class="mdc-checkbox__native-control"
                                checked />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label">Secondary</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--success">
                        <input type="checkbox"
                                id="basic-disabled-checkbox"
                                class="mdc-checkbox__native-control"
                                checked />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label">Success</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--info">
                        <input type="checkbox"
                                id="basic-disabled-checkbox"
                                class="mdc-checkbox__native-control"
                                checked />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label">Info</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--warning">
                        <input type="checkbox"
                                id="basic-disabled-checkbox"
                                class="mdc-checkbox__native-control"
                                checked />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label">Warning</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--light">
                        <input type="checkbox"
                                id="basic-disabled-checkbox"
                                class="mdc-checkbox__native-control"
                                checked />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label">Light</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--dark">
                        <input type="checkbox"
                                id="basic-disabled-checkbox"
                                class="mdc-checkbox__native-control"
                                checked />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark"
                                viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark-path"
                                  fill="none"
                                  d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-disabled-checkbox" id="basic-disabled-checkbox-label">Dark</label>
                    </div>
                    <div class="mdc-form-field">
                      <div class="mdc-checkbox mdc-checkbox--custom">
                        <input type="checkbox" id="basic-custom-checkbox" class="mdc-checkbox__native-control" />
                        <div class="mdc-checkbox__background">
                          <svg class="mdc-checkbox__checkmark" viewBox="0 0 24 24">
                            <path class="mdc-checkbox__checkmark__path" dropzone=""fill="none" stroke="white" d="M1.73,12.91 8.1,19.28 22.79,4.59"/>
                          </svg>
                          <div class="mdc-checkbox__mixedmark"></div>
                        </div>
                      </div>
                      <label for="basic-custom-checkbox">Custom colored</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </main>
        <!-- partial:../../partials/_footer.html -->
        <footer>
          <div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                <span class="text-center text-sm-left d-block d-sm-inline-block tx-14">Copyright © <a href="https://www.bootstrapdash.com/" target="_blank">bootstrapdash.com </a>2020</span>
              </div>
              <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop d-flex justify-content-end">
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center tx-14">Free <a href="https://www.bootstrapdash.com/material-design-dashboard/" target="_blank"> material admin </a> dashboards from Bootstrapdash.com</span>
              </div>
            </div>
          </div>
        </footer>
        <!-- partial -->
      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="../../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../../assets/js/material.js"></script>
  <script src="../../../assets/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>
</html>