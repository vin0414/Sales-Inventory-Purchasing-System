<!DOCTYPE html>
<html lang="en" >
    <!--begin::Head-->
    <head>
        <title><?=$about['App_name']?> | <?=$title?></title>
        <meta charset="utf-8"/>
        <meta name="description" content="<?=$about['App_details']?>"/>
        <meta name="keywords" content="<?=$about['App_name']?>, <?=$about['App_details']?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="shortcut icon" href="<?=base_url('assets/img')?>/<?=$logo['File']?>"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/> 
        <link href="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.css')?>" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url('assets/plugins/global/plugins.bundle.css')?>" rel="stylesheet" type="text/css"/>
        <link href="<?=base_url('assets/css/style.bundle.css')?>" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/2.1.4/css/dataTables.dataTables.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            @media only screen and (max-width: 500px) {
                .logo {
                display: none;
                }
            }
            /* Track */
            ::-webkit-scrollbar-track {
              background: #f1f1f1; 
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: #888; 
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: #555; 
            }
            ::-webkit-scrollbar {
                height: 4px;              /* height of horizontal scrollbar ← You're missing this */
                width: 0px;               /* width of vertical scrollbar */
                border: 1px solid #d5d5d5;
            }  
        </style>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> 
		<script type="text/javascript">
			google.charts.load('visualization', "1", {
				packages: ['corechart']
			});
		</script>
    </head>
    <body  id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true" data-kt-app-header-secondary-enabled="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true"  class="app-default" >
    <script>
        var defaultThemeMode = "light";
        var themeMode;

        if ( document.documentElement ) {
            if ( document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if ( localStorage.getItem("data-bs-theme") !== null ) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }			
            }

            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }

            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }            
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">     
            <div id="kt_app_header" class="app-header">
                <div class="app-header-primary">
                    <div class="app-container  container-fluid d-flex align-items-stretch justify-content-between " id="kt_app_header_primary_container">
                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="d-flex">
                                <div class="app-header-logo d-flex flex-center gap-2 me-lg-15">
                                    <button class="btn btn-icon btn-sm btn-custom d-flex d-lg-none ms-n2" id="kt_app_header_menu_toggle">
                                        <i class="fa-solid fa-bars"></i>	
                                    </button>
                                    <a href="<?=site_url('admin/overview')?>">
                                        <img alt="Logo" src="<?=base_url('assets/img')?>/<?=$logo['File']?>" class="logo mh-25px"/>
                                    </a>
                                </div>
                                <div class="d-flex align-items-stretch" id="kt_app_header_menu_wrapper">
                                    <div 
                                        class="app-header-menu app-header-mobile-drawer align-items-stretch" 

                                        data-kt-drawer="true"
                                        data-kt-drawer-name="app-header-menu"
                                        data-kt-drawer-activate="{default: true, lg: false}"
                                        data-kt-drawer-overlay="true"
                                        data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                                        data-kt-drawer-direction="start"
                                        data-kt-drawer-toggle="#kt_app_header_menu_toggle" 

                                        data-kt-swapper="true"
                                        data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                                        data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_menu_wrapper'}"
                                    >   
                                        <!--begin::Menu-->
                                        <div 
                                            class="
                                                menu 
                                                menu-rounded 
                                                menu-column 
                                                menu-lg-row 
                                                menu-active-bg 
                                                menu-title-gray-700 
                                                menu-state-gray-900 
                                                menu-icon-gray-500
                                                menu-arrow-gray-500 
                                                menu-state-icon-primary
                                                menu-state-bullet-primary
                                                fw-semibold 
                                                fs-6 
                                                align-items-stretch 
                                                my-5 
                                                my-lg-0 
                                                px-2 
                                                px-lg-0
                                            " 
                                            id="#kt_app_header_menu" 
                                            data-kt-menu="true"
                                        >        
                                            <!--begin:Menu item-->
                                            <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2" ><!--begin:Menu link-->
                                                <span class="menu-link"  >
                                                    <span  class="menu-title" >Dashboards</span>
                                                </span>
                                                <!--end:Menu link--><!--begin:Menu sub-->
                                                <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-850px" ><!--begin:Dashboards menu-->
                                                </div><!--end:Menu sub-->
                                            </div><!--end:Menu item-->
                                            <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2" >
                                                <span class="menu-link"><span  class="menu-title" >Apps</span>
                                                <span  class="menu-arrow d-lg-none" ></span></span>
                                                <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px" >
                                                    <!--begin:Menu item-->
                                                    <div  data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"  class="menu-item menu-lg-down-accordion" >
                                                        <!--begin:Menu link-->
                                                        <span class="menu-link"  >
                                                            <span  class="menu-icon" ><i class="fa-solid fa-user-gear"></i></span>
                                                            <span  class="menu-title" >User Management</span><span  class="menu-arrow" ></span>
                                                        </span><!--end:Menu link-->
                                                        <!--begin:Menu sub-->
                                                        <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px" >
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/all-accounts')?>">
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >User List</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/new-account')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Add User</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                        </div><!--end:Menu sub-->
                                                    </div><!--end:Menu item-->
                                                    <div  data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"  class="menu-item menu-lg-down-accordion" >
                                                        <!--begin:Menu link-->
                                                        <span class="menu-link"  >
                                                            <span  class="menu-icon" ><i class="fa-solid fa-list-check"></i></span>
                                                            <span  class="menu-title" >Manage Products</span><span  class="menu-arrow" ></span>
                                                        </span><!--end:Menu link-->
                                                        <!--begin:Menu sub-->
                                                        <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px" >
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/products')?>">
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Products & Services</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/products/new')?>">
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >New Product/Services</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/products/add-stock')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Add Stock</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/products/transfer')?>">
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Transfer Stocks</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item--></span>
                                                        </div><!--end:Menu sub-->
                                                    </div><!--end:Menu item-->
                                                    <div  data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"  class="menu-item menu-lg-down-accordion" >
                                                        <!--begin:Menu link-->
                                                        <span class="menu-link"  >
                                                            <span  class="menu-icon" ><i class="fa-solid fa-people-group"></i></span>
                                                            <span  class="menu-title" >Manage Vendor</span><span  class="menu-arrow" ></span>
                                                        </span><!--end:Menu link-->
                                                        <!--begin:Menu sub-->
                                                        <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px" >
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/vendors/new')?>">
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >New Vendor</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/vendors')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >All Vendors</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/vendors/import')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Import</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                        </div><!--end:Menu sub-->
                                                    </div><!--end:Menu item-->
                                                    <div  class="menu-item" ><!--begin:Menu link-->
                                                        <a class="menu-link"  href="<?=site_url('admin/orders')?>"  >
                                                            <span  class="menu-icon" ><i class="fa-solid fa-cart-shopping"></i></span>
                                                            <span  class="menu-title" >Order Management</span>
                                                        </a><!--end:Menu link-->
                                                    </div><!--end:Menu item-->
                                                    <div  class="menu-item" ><!--begin:Menu link-->
                                                        <a class="menu-link"  href="<?=site_url('admin/purchase')?>"  >
                                                            <span  class="menu-icon" ><i class="fa-solid fa-store"></i></span>
                                                            <span  class="menu-title" >Purchasing</span>
                                                        </a><!--end:Menu link-->
                                                    </div><!--end:Menu item-->
                                                    <div  class="menu-item" ><!--begin:Menu link-->
                                                        <a class="menu-link"  href="<?=site_url('admin/logs')?>">
                                                            <span  class="menu-icon" ><i class="fa-regular fa-clipboard"></i></span>
                                                            <span  class="menu-title" >System Logs<span>
                                                        </a><!--end:Menu link-->
                                                    </div><!--end:Menu item-->
                                                </div><!--end:Menu sub-->
                                            </div><!--end:Menu item-->
                                            <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2" >
                                                <span class="menu-link"><span  class="menu-title" >Reports</span>
                                                <span  class="menu-arrow d-lg-none" ></span></span>
                                                <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-250px" >
                                                    <!--begin:Menu item-->
                                                    <div  data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"  class="menu-item menu-lg-down-accordion" >
                                                        <!--begin:Menu link-->
                                                        <span class="menu-link"  >
                                                            <span  class="menu-icon" ><i class="fa-solid fa-chart-simple"></i></span>
                                                            <span  class="menu-title" >Sales Report</span><span  class="menu-arrow" ></span>
                                                        </span><!--end:Menu link-->
                                                        <!--begin:Menu sub-->
                                                        <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px" >
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/sales/summary')?>">
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Sales Summary</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/sales/product')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Sales By Product</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/sales/return')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Sales Return</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                        </div><!--end:Menu sub-->
                                                    </div><!--end:Menu item-->
                                                    <div  data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start"  class="menu-item menu-lg-down-accordion" >
                                                        <!--begin:Menu link-->
                                                        <span class="menu-link"  >
                                                            <span  class="menu-icon" ><i class="fa-solid fa-square-poll-vertical"></i></span>
                                                            <span  class="menu-title" >Inventory Report</span><span  class="menu-arrow" ></span>
                                                        </span><!--end:Menu link-->
                                                        <!--begin:Menu sub-->
                                                        <div  class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-active-bg px-lg-2 py-lg-4 w-lg-225px" >
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/inventory/summary')?>">
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Inventory Summary</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/inventory/stock-movement')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Stock Movement</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/inventory/out-of-stock')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Low Stock/Out-of-Stock</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/inventory/re-order')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Re-Order</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                                <a class="menu-link"  href="<?=site_url('admin/inventory/others')?>"  >
                                                                    <span  class="menu-bullet" ><span class="bullet bullet-dot"></span></span>
                                                                    <span  class="menu-title" >Damaged/Expired Goods</span>
                                                                </a><!--end:Menu link-->
                                                            </div><!--end:Menu item-->
                                                        </div><!--end:Menu sub-->
                                                    </div><!--end:Menu item-->
                                                </div><!--end:Menu sub-->
                                            </div><!--end:Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </div>
                                    <!--end::Menu holder-->			
                                </div>
                        <!--end::Menu wrapper-->	
                    </div>    
                        <!--begin::Navbar-->
                        <div class="app-navbar flex-shrink-0 gap-2">
                            <!--begin::Notifications-->
                            <div class="app-navbar-item ms-1">
                                <!--begin::Menu- wrapper-->
                                <div class="btn btn-sm btn-icon btn-custom h-35px w-35px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                    <i class="fa-regular fa-bell"></i>        
                                </div>
                                
                        <!--end::Menu-->        <!--end::Menu wrapper-->
                            </div>
                            <!--end::Notifications-->    
                            
                            <!--begin::User menu-->
                            <div class="app-navbar-item ms-1">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol position-relative symbol-35px" 
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}" 
                                    data-kt-menu-attach="parent" 
                                    data-kt-menu-placement="bottom-end">
                                    <img src="<?=base_url('assets/img/profile.png')?>" alt="user"/>

                                    <span class="bullet bullet-dot bg-success h-6px w-6px position-absolute translate-middle mb-1 bottom-0 start-100 animation-blink"></span>
                                </div>
                                
                        <!--begin::User account menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px" data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="<?=base_url('assets/img/profile.png')?>"/>
                                    </div>
                                    <!--end::Avatar-->

                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bold d-flex align-items-center fs-5">
                                            <?php echo session()->get('fullname') ?>
                                        </div>

                                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">
                                            <?php echo session()->get('role') ?>              
                                        </a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title position-relative">
                                            Mode 

                                            <span class="ms-5 position-absolute translate-middle-y top-50 end-0">
                                                <i class="fa-regular fa-sun"></i>                      
                                                <i class="fa-solid fa-moon"></i>                   
                                            </span>
                                        </span>
                                    </a>

                                    <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-0">
                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="fa-regular fa-sun"></i>            
                                    </span>
                                    <span class="menu-title">
                                        Light
                                    </span>
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-0">
                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="fa-solid fa-moon"></i>            
                                    </span>
                                    <span class="menu-title">
                                        Dark
                                    </span>
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-3 my-0">
                                <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                    <span class="menu-icon" data-kt-element="icon">
                                        <i class="fa-solid fa-computer"></i>           
                                    </span>
                                    <span class="menu-title">
                                        System
                                    </span>
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->

                                </div>
                                <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-5 my-1">
                                <a href="<?=site_url('admin/account')?>" class="menu-link px-5">
                                    Account Settings
                                </a>
                            </div>
                            <!--end::Menu item-->

                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="<?=site_url('/logout')?>" class="menu-link px-5">
                                    Sign Out
                                </a>
                            </div>
                            <!--end::Menu item-->
                        </div>
                        <!--end::User account menu-->
                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu--> 

                            <!--begin::Header menu toggle-->
                            <div class="app-navbar-item d-lg-none" title="Show header menu">
                                <button class="btn btn-sm btn-icon btn-custom h-35px w-35px" id="kt_header_secondary_mobile_toggle">
                                    <i class="fa-brands fa-elementor"></i>      
                                </button>
                            </div>
                            <!--end::Header menu toggle-->

                            <!--begin::Header menu toggle-->
                            <div class="app-navbar-item d-lg-none me-n3" title="Show header menu">
                                <button class="btn btn-sm btn-icon btn-custom h-35px w-35px" id="kt_app_sidebar_mobile_toggle">
                                    <i class="fa-brands fa-buffer"></i>      
                                </button>
                            </div>
                            <!--end::Header menu toggle-->
                        </div>
                        <!--end::Navbar-->
                        </div>
                    </div>             
                </div>
                <div class="app-header-secondary  app-header-mobile-drawer "
                    data-kt-drawer="true" data-kt-drawer-name="app-header-secondary" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_secondary_mobile_toggle"                                  
                    data-kt-swapper="true" data-kt-swapper-mode="{default: 'append', lg: 'append'}" data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header'}" >

                    <!--begin::Header secondary wrapper-->
                    <div class="d-flex flex-column flex-grow-1 overflow-hidden">
                        <div class="app-header-secondary-menu-main d-flex flex-grow-lg-1 align-items-end pt-3 pt-lg-2 px-3 px-lg-0 w-auto overflow-auto flex-nowrap">
                            <div class="app-container  container-fluid ">
                                <!--begin::Main menu-->
                                <div 
                                    class="
                                        menu 
                                        menu-rounded 
                                        menu-nowrap
                                        flex-shrink-0
                                        menu-row 
                                        menu-active-bg 
                                        menu-title-gray-700 
                                        menu-state-gray-900 
                                        menu-icon-gray-500
                                        menu-arrow-gray-500 
                                        menu-state-icon-primary
                                        menu-state-bullet-primary
                                        fw-semibold 
                                        fs-base 
                                        align-items-stretch 
                                    " 
                                    id="#kt_app_header_secondary_menu" 
                                    data-kt-menu="true"
                                >        
                                    <!--begin:Menu item-->
                                    <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start"  class="menu-item" >
                                        <!--begin:Menu link-->
                                        <a class="menu-link"  href="<?=site_url('admin/overview')?>"><span  class="menu-title" >Overview</span></a>
                                        <!--end:Menu link-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" ><!--begin:Menu content-->
                                        <div  class="menu-content" ><div class="menu-separator"></div></div><!--end:Menu content-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item " >
                                        <!--begin:Menu link-->
                                        <a class="menu-link"  href="<?=site_url('admin/sales')?>"><span  class="menu-title" >Sales</span></a>
                                        <!--end:Menu link-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" >
                                        <!--begin:Menu content--><div  class="menu-content" ><div class="menu-separator"></div></div>
                                        <!--end:Menu content-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item " ><!--begin:Menu link-->
                                        <a class="menu-link"  href="<?=site_url('admin/inventory')?>"><span  class="menu-title" >Inventory</span></a>
                                        <!--end:Menu link-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" ><!--begin:Menu content-->
                                        <div  class="menu-content" ><div class="menu-separator"></div></div><!--end:Menu content-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" ><!--begin:Menu link-->
                                        <a class="menu-link active"  href="<?=site_url('admin/settings')?>"><span  class="menu-title" >Settings</span></a>
                                        <!--end:Menu link-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" ><!--begin:Menu content-->
                                        <div  class="menu-content" ><div class="menu-separator"></div></div><!--end:Menu content-->
                                    </div>
                                    <!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item flex-grow-1" ></div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" >
                                        <!--begin:Menu content-->
                                        <div  class="menu-content" >
                                            <div class="menu-separator d-block d-lg-none"></div>
                                        </div><!--end:Menu content-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" >
                                        <!--begin:Menu content-->
                                        <div  class="menu-content" ><div class="menu-separator"></div></div><!--end:Menu content-->
                                    </div><!--end:Menu item-->
                                    <!--begin:Menu item-->
                                    <div  data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-end"  class="menu-item " >
                                        <!--begin:Menu link-->
                                        <span class="menu-link"  >
                                            <span  class="menu-title" >Tools</span><span  class="menu-arrow" ></span>
                                        </span><!--end:Menu link-->
                                        <!--begin:Menu sub-->
                                        <div  class="menu-sub menu-sub-dropdown px-lg-2 py-lg-4 w-150px w-lg-175px" >
                                            <!--begin:Menu item-->
                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                <a class="menu-link"  href="<?=site_url('admin/settings')?>">
                                                    <span  class="menu-icon" ><i class="fa-solid fa-screwdriver-wrench"></i></span>
                                                    <span  class="menu-title" >Settings</span>
                                                </a><!--end:Menu link-->
                                            </div><!--end:Menu item-->
                                            <!--begin:Menu item-->
                                            <div  class="menu-item" ><!--begin:Menu link-->
                                                <a class="menu-link"  href="<?=site_url('admin/recovery')?>">
                                                    <span  class="menu-icon" ><i class="fa-solid fa-file-shield"></i></span>
                                                    <span  class="menu-title" >Recovery</span>
                                                </a><!--end:Menu link-->
                                            </div><!--end:Menu item-->
                                        </div><!--end:Menu sub-->
                                    </div><!--end:Menu item-->		
                                </div>
                                <!--end::Menu-->
                            </div>
                        </div>
                        
                        <div class="app-header-secondary-menu-sub d-flex align-items-stretch flex-grow-1">
                            <div class="app-container d-flex flex-column flex-lg-row align-items-stretch justify-content-lg-between  container-fluid ">
                                <!--begin::Main menu-->
                                <div 
                                    class="
                                        menu 
                                        menu-rounded 
                                        menu-column 
                                        menu-lg-row 
                                        menu-active-bg 
                                        menu-title-gray-700 
                                        menu-state-gray-900 
                                        menu-icon-gray-500
                                        menu-arrow-gray-500 
                                        menu-state-icon-primary 
                                        menu-state-bullet-primary 
                                        fw-semibold 
                                        fs-base 
                                        align-items-stretch 
                                        my-2 
                                        my-lg-0 
                                        px-2 
                                        px-lg-0		
                                    " 
                                    id="#kt_app_header_tertiary_menu" 
                                    data-kt-menu="true"
                                >        
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" >
                                        <!--begin:Menu link-->
                                        <a class="menu-link active"  href="<?=site_url('admin/overview')?>">
                                            <span  class="menu-icon" >
                                                <i class="fa-solid fa-screwdriver-wrench"></i>
                                            </span>
                                            <span class="menu-title" >Settings</span>
                                        </a><!--end:Menu link-->
                                    </div><!--end:Menu item-->		
                                    <!--begin:Menu item-->
                                    <div  class="menu-item" >
                                        <!--begin:Menu link-->
                                        <a class="menu-link"  href="javascript:void(0);" onclick="Print()">
                                            <span  class="menu-icon" >
                                                <i class="fa-solid fa-print"></i>
                                            </span>
                                            <span class="menu-title" >Print</span>
                                        </a><!--end:Menu link-->
                                    </div><!--end:Menu item-->
                                </div>
                                <!--end::Menu-->	
                            </div>	
                        </div>
                    </div>
                    <!--end::Header secondary wrapper-->                                
                </div>
                <!--end::Header secondary-->
            
            </div>
            <!--end::Header-->        
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">                                        
            <!--begin::Sidebar-->
            <div id="kt_app_sidebar" class="app-sidebar " 
            data-kt-drawer="true" data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"      
            >
                    <!--begin::Sidebar wrapper-->
                    <div
                        id="kt_app_sidebar_wrapper"
                        class="flex-grow-1 hover-scroll-y mt-9 mb-5 px-2 mx-3 ms-lg-7 me-lg-5"
                        data-kt-scroll="true"
                        data-kt-scroll-activate="true"
                        data-kt-scroll-height="auto"     
                        data-kt-scroll-dependencies="{default: false, lg: '#kt_app_header'}"
                        data-kt-scroll-offset="5px"
                    >
                        <!--begin::Filter-->
                    <div class="mb-4">
                        <a href="<?=site_url('admin/products/new')?>" class="btn btn-sm d-flex flex-stack border border-300 bg-gray-100i btn-color-gray-700 btn-active-color-gray-900 px-3 mb-2">               
                            <span class="d-flex align-item-center"><i class="fa-solid fa-plus"></i>&nbsp;&nbsp;&nbsp;New Product</span>         
                        </a> 
                        <!--begin::Items-->
                        <div class="m-0">
                            <!--begin::Item-->
                            <a href="<?=site_url('admin/new-account')?>" class="btn btn-sm px-3 border border-transparent btn-color-gray-700 btn-active-color-gray-900">               
                                <i class="fa-solid fa-user-tie"></i>&nbsp;New Account           
                            </a>  
                            <!--end::Item-->
                        </div>
                        <!--begin::Items-->
                        <div class="m-0">
                            <!--begin::Item-->
                            <a href="<?=site_url('admin/accounts')?>" class="btn btn-sm px-3 border border-transparent btn-color-gray-700 btn-active-color-gray-900">               
                                <i class="fa-solid fa-users"></i>&nbsp;All Accounts           
                            </a>  
                            <!--end::Item-->
                        </div>
                        <!--begin::Items-->
                        <div class="m-0">
                            <!--begin::Item-->
                            <a href="<?=site_url('admin/vendors')?>" class="btn btn-sm px-3 border border-transparent btn-color-gray-700 btn-active-color-gray-900">               
                                <i class="fa-solid fa-people-group"></i>&nbsp;Vendors         
                            </a>  
                            <!--end::Item--> 
                        </div>
                        <!--end::Items--> 
                        <!--begin::Items-->
                        <div class="m-0">
                            <!--begin::Item-->
                            <a href="<?=site_url('admin/track')?>" class="btn btn-sm px-3 border border-transparent btn-color-gray-700 btn-active-color-gray-900">               
                                <i class="fa-solid fa-magnifying-glass-location"></i>&nbsp;Track Orders         
                            </a>  
                            <!--end::Item--> 
                        </div>
                        <!--end::Items-->   
                    </div>
                    <!--end::Filter-->
                        
                    <!--begin::Main menu-->
                    <div 
                        class="
                            menu-sidebar 
                            menu 
                            menu-fit 
                            menu-column 
                            menu-rounded 
                            menu-title-gray-700 
                            menu-icon-gray-700
                            menu-arrow-gray-700 
                            fw-semibold 
                            fs-6 
                            align-items-stretch 
                            flex-grow-1  
                        " 
                        id="#kt_app_sidebar_menu" 
                        data-kt-menu="true"
                        data-kt-menu-expand="true">        
                        <div  class="menu-item py-1" ><!--begin:Menu content-->
                            <div  class="menu-content" >
                                <div class="separator separator-dashed"></div>
                            </div><!--end:Menu content-->
                        </div><!--end:Menu item-->
                        <!--begin:Menu item-->
                        <div  data-kt-menu-trigger="click"  class="menu-item menu-accordion show" ><!--begin:Menu link-->
                            <span class="menu-title">Top Selling Items</span>
                        
                        </div><!--end:Menu item-->
                    </div>
                    <!--end::Menu-->
                </div>
                <!--end::Sidebar wrapper-->    
            </div>
            <!--end::Sidebar-->                
            <!--begin::Main-->
            <div class="app-main flex-column flex-row-fluid " id="kt_app_main">
                <div class="d-flex flex-column flex-column-fluid">
                    <!--begin::Toolbar-->
                    <div id="kt_app_toolbar" class="app-toolbar  pt-10 mb-0 ">                        
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex align-items-stretch ">
                            <!--begin::Toolbar wrapper-->
                            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center gap-1 me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex flex-column justify-content-center text-gray-900 fw-bold fs-3 m-0">
                                    <?=$title?>
                                    </h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0">
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <a href="<?=site_url('admin/overview')?>" class="text-muted text-hover-primary">
                                            <?=$about['App_name']?>                           
                                            </a>
                                        </li>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item">
                                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                                        </li>
                                        <!--end::Item-->                 
                                        <!--begin::Item-->
                                        <li class="breadcrumb-item text-muted">
                                            <?=$title?>                                       
                                        </li>
                                        <!--end::Item-->                     
                                    </ul>
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->   
                                <!--begin::Actions-->
                                <div class="d-flex align-items-center gap-2 gap-lg-3">
                                    <a href="<?=site_url('admin/new-account-expense')?>" class="btn btn-sm btn-flex btn-outline btn-active-primary bg-body newCategory">
                                        <i class="fa-solid fa-layer-group"></i>&nbsp;New Expense
                                    </a>
                                    <a href="<?=site_url('admin/new-warehouse')?>" class="btn btn-sm btn-flex btn-outline btn-active-primary bg-body newEntry">
                                        <i class="fa-solid fa-plus"></i>&nbsp;New Warehouse
                                    </a>          
                                </div>
                                <!--end::Actions--> 
                            </div>
                        <!--end::Toolbar wrapper-->        
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar-->  
                    <div id="kt_app_content" class="app-content  flex-column-fluid " >
                        <div id="kt_app_content_container" class="app-container container-fluid ">
                            <?php if(!empty(session()->getFlashdata('success'))) : ?>
                                <div class="alert alert-success d-flex align-items-center p-5">
                                    <?= session()->getFlashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <ul class="nav nav-pills nav-tabs nav-stretch nav-line-tabs-2x mb-5 fs-6 border-0">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_4">Application Setup</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_5">Warehouse</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_6">Account Expense</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="kt_tab_pane_4" role="tabpanel">
                                    <div class="d-flex flex-column flex-lg-row gap-5">
                                        <div class="col-lg-3">
                                            <div class="card card-flush py-4">
                                                <div class="card-header">
                                                    <div class="card-title"><i class="fa-solid fa-computer"></i>&nbsp;System Logo</div>
                                                </div>
                                                <div class="card-body text-center pt-0">
                                                    <form method="POST" class="form w-100" enctype="multipart/form-data" id="frmUpload">
                                                        <div class="fv-row mb-4">
                                                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true">
                                                                <!--begin::Preview existing avatar-->
                                                                <?php if(empty($logo['File'])){ ?>
                                                                <div class="image-input-wrapper w-150px h-150px"></div>
                                                                <!--end::Preview existing avatar-->
                                                                <?php }else { ?>
                                                                    <div class="image-input-wrapper w-150px h-150px" style="background-image: url('<?=base_url("assets/img")?>/<?=$logo['File']?>')"></div>
                                                                <?php } ?>
                                                                <!--begin::Label-->
                                                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change Logo">
                                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                                    <!--begin::Inputs-->
                                                                    <input type="file" name="file" accept=".png, .jpg, .jpeg, .svg" required/>
                                                                    <input type="hidden" name="avatar_remove" />
                                                                    <!--end::Inputs-->
                                                                </label>
                                                                <!--end::Label-->

                                                                <!--begin::Cancel-->
                                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel Logo">
                                                                    <i class="fa-solid fa-trash"></i>            
                                                                </span>
                                                                <!--end::Cancel-->

                                                                <!--begin::Remove-->
                                                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove Logo">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </span>
                                                                <!--end::Remove-->
                                                            </div>
                                                            <!--end::Image input-->
                                                        </div>
                                                        <div class="fv-row mb-4">
                                                            <button type="submit" class="btn btn-primary" id="btnUpload"><i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp;Upload</button>
                                                        </div>
                                                    </form>
                                                    <!--begin::Description-->
                                                    <div class="text-muted fs-7">Only *.png, *.jpg and *.jpeg image files are accepted</div>
                                                    <!--end::Description-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="card card-flush py-4">
                                                <div class="card-header">
                                                    <div class="card-title"><i class="fa-solid fa-computer"></i>&nbsp;System</div>
                                                </div>
                                                <div class="card-body pt-0">
                                                    <form method="POST" class="form w-100" id="frmSystem">
                                                        <div class="fv-row mb-4">
                                                            <span class="menu-title">Application Name</span>
                                                            <?php if(empty($about)){ ?>
                                                            <input type="text" class="form-control" name="app_name" value="" required/>
                                                            <?php }else{ ?>
                                                            <input type="text" class="form-control" name="app_name" value="<?=$about['App_name']?>" required/>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="fv-row mb-4">
                                                            <span class="menu-title">Application Details</span>
                                                            <?php if(empty($about)){ ?>
                                                            <textarea class="form-control h-100px" name="app_details"></textarea>
                                                            <?php }else{ ?>
                                                            <textarea class="form-control h-100px" name="app_details"><?=$about['App_details']?></textarea>
                                                            <?php } ?>
                                                        </div>
                                                        <div class="fv-row mb-4">
                                                            <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i>&nbsp;Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_5" role="tabpanel">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <i class="fa-solid fa-warehouse"></i>&nbsp;Warehouse
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered align-middle table-striped" id="tblwarehouse">
                                                    <thead>
                                                        <th class="bg-primary text-white">Name</th>
                                                        <th class="bg-primary text-white w-275px">Address</th>
                                                        <th class="bg-primary text-white w-100px">Email</th>
                                                        <th class="bg-primary text-white w-100px">Contact No</th>
                                                        <th class="bg-primary text-white w-50px">Status</th>
                                                        <th class="bg-primary text-white w-50px">More</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($list as $row): ?>
                                                            <tr>
                                                                <td><?php echo $row['w_Name'] ?></td>
                                                                <td><small><?php echo $row['w_Address'] ?></small></td>
                                                                <td><?php echo $row['w_Email'] ?></td>
                                                                <td><?php echo $row['w_Phone'] ?></td>
                                                                <td>
                                                                    <?php if($row['w_Status']==1){echo "<span class='badge bg-success text-white'>Active</span>";}else{echo "<span class='badge bg-danger text-white'>Inactive</span>";} ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?=site_url('admin/edit-warehouse/')?><?php echo $row['wID'] ?>" class="btn btn-primary btn-sm">
                                                                        <i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <div class="tab-pane fade" id="kt_tab_pane_6" role="tabpanel">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <i class="fa-solid fa-layer-group"></i>&nbsp;Account Expense
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered align-middle table-striped" id="tblcategory">
                                                    <thead>
                                                        <th class="bg-primary text-white w-100px">Account Code</th>
                                                        <th class="bg-primary text-white w-375px">Account Details</th>
                                                        <th class="bg-primary text-white w-50px">More</th>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach($expense as $row): ?>
                                                        <tr>
                                                            <td>&nbsp;<?php echo $row['accountCode'] ?></td>
                                                            <td><?php echo $row['accountDetails'] ?></td>
                                                            <td>
                                                                <a href="<?=site_url('admin/edit-code/')?><?php echo $row['expenseID'] ?>" class="btn btn-primary btn-sm">
                                                                    <i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>         
            </div>
            <!--end::Wrapper-->        
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->		
		<!--begin::Scrolltop-->
		<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
			<i class="ki-outline ki-arrow-up"></i>
		</div>
		<!--end::Scrolltop-->
		<!--begin::Global Javascript Bundle(mandatory for all pages)-->
		<script src="<?=base_url('assets/plugins/global/plugins.bundle.js')?>"></script>
		<script src="<?=base_url('assets/js/scripts.bundle.js')?>"></script>
		<!--end::Global Javascript Bundle-->

		<!--begin::Vendors Javascript(used for this page only)-->
		<script src="<?=base_url('assets/plugins/custom/datatables/datatables.bundle.js')?>"></script>
		<!--end::Vendors Javascript-->

		<!--begin::Custom Javascript(used for this page only)-->
		<script src="<?=base_url('assets/js/widgets.bundle.js')?>"></script>
		<script src="<?=base_url('assets/js/custom/widgets.js')?>"></script>
		<!--end::Custom Javascript-->
        <script src="https://cdn.datatables.net/2.1.4/js/dataTables.js"></script>
	    <!--end::Javascript-->
        <script>
            new DataTable('#tblwarehouse');
            new DataTable('#tblcategory');
        </script>
        <script>
            $('#frmUpload').on('submit',function(e){
                e.preventDefault();
                $.ajax({
                    url:"<?=site_url('upload-logo')?>",method:"POST",
                    data:new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function(){
                        $('#btnUpload').attr("disabled","disabled");
                        $('#frmUpload').css("opacity",".5");
                    },
                    success:function(data)
                    {
                        if(data==="success")
                        {
                           location.reload();
                        }
                        else
                        {
                            Swal.fire(
                                'Warning!',
                                data,
                                'warning'
                                );
                        }
                        $('#frmUpload').css("opacity","");
                        $("#btnUpload").removeAttr("disabled");
                    }
                });
            });

            $('#frmSystem').on('submit',function(e){
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    url:"<?=site_url('about')?>",method:"POST",
                    data:data,
                    success:function(response)
                    {
                        if(response==="success")
                        {
                            location.reload();
                        }
                        else
                        {
                            Swal.fire(
                                'Warning!',
                                response,
                                'warning'
                                );
                        }
                    }
                });
            });
        </script>
        <script>
            function Print() 
            {
                var printContents = document.getElementById("kt_app_content_container").innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
            }
        </script>
    </body>
    <!--end::Body-->
</html>