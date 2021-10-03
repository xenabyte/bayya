@include('admin.inc.header')

    <!-- Main Page Content -->
    <div class="page-content">

        <div class="row mt-n24">

            <div class="col-6 col-sm-4 col-lg-2 col-md-3 mt-24">
                <div class="widget widget-sm widget-weather-sm h-full">
                    <div class="widget-icon-bg">
                        <img src="../../assets/widgets/amcharts-weather-icons/cloudy-day-1.svg" width="80">
                    </div>
                    <h4 class="widget-degree">
                        29<small>°</small>
                    </h4>
                    <h6>New York City</h6>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 col-md-3 mt-24">
                <div class="widget widget-sm h-full">
                    <svg fill="#000" viewBox="0 0 42 32">
                        <path d="M39.5 14h-37c-0.154 0-0.3 0.071-0.395 0.192s-0.128 0.279-0.091 0.429l4.006 16.017c0.096 0.337 0.391 1.362 1.48 1.362h27c1.093 0 1.385-1.026 1.485-1.379l4-16c0.037-0.149 0.004-0.308-0.091-0.429s-0.24-0.192-0.394-0.192zM35.020 30.363c-0.182 0.637-0.37 0.637-0.52 0.637h-27c-0.149 0-0.336 0-0.515-0.621l-3.844-15.379h35.719l-3.84 15.363zM18.5 28c0.276 0 0.5-0.224 0.5-0.5v-9c0-0.276-0.224-0.5-0.5-0.5s-0.5 0.224-0.5 0.5v9c0 0.276 0.224 0.5 0.5 0.5zM11.499 28c0.019 0 0.037-0.001 0.057-0.003 0.274-0.031 0.472-0.278 0.441-0.552l-1-9c-0.030-0.275-0.27-0.469-0.553-0.442-0.274 0.031-0.472 0.278-0.441 0.552l1 9c0.028 0.256 0.245 0.445 0.496 0.445zM24.5 28c0.276 0 0.5-0.224 0.5-0.5v-9c0-0.276-0.224-0.5-0.5-0.5s-0.5 0.224-0.5 0.5v9c0 0.276 0.224 0.5 0.5 0.5zM30.444 27.997c0.020 0.002 0.038 0.003 0.057 0.003 0.251 0 0.468-0.189 0.496-0.445l1-9c0.030-0.274-0.167-0.521-0.441-0.552-0.287-0.028-0.522 0.167-0.553 0.442l-1 9c-0.030 0.274 0.167 0.521 0.441 0.552zM34.5 12c0.116 0 0.232-0.040 0.327-0.122 0.209-0.181 0.231-0.496 0.051-0.705l-9.5-11c-0.181-0.21-0.496-0.231-0.705-0.052-0.209 0.181-0.231 0.496-0.051 0.705l9.5 11c0.099 0.115 0.238 0.174 0.378 0.174zM17.816 0.113c-0.213-0.173-0.528-0.144-0.703 0.071l-9 11c-0.175 0.213-0.144 0.528 0.070 0.704 0.093 0.075 0.206 0.112 0.317 0.112 0.145 0 0.288-0.062 0.387-0.184l9-11c0.175-0.213 0.143-0.528-0.071-0.703zM41.5 10h-4c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h4c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5zM13.5 11h16c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-16c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5zM0.5 11h5c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-5c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5z"></path>
                    </svg>
                    <h4><span class="counter">5</span></h4>
                    <h6>New Sales</h6>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 col-md-3 mt-24">
                <div class="widget widget-sm h-full">
                    <svg fill="#000" viewBox="0 0 36 32">
                        <path d="M0.5 31.983c0.268 0.067 0.542-0.088 0.612-0.354 1.030-3.843 5.216-4.839 7.718-5.435 0.627-0.149 1.122-0.267 1.444-0.406 2.85-1.237 3.779-3.227 4.057-4.679 0.034-0.175-0.029-0.355-0.165-0.473-1.484-1.281-2.736-3.204-3.526-5.416-0.022-0.063-0.057-0.121-0.103-0.171-1.045-1.136-1.645-2.337-1.645-3.294 0-0.559 0.211-0.934 0.686-1.217 0.145-0.087 0.236-0.24 0.243-0.408 0.221-5.094 3.849-9.104 8.299-9.13 0.005 0 0.102 0.007 0.107 0.007 4.472 0.062 8.077 4.158 8.206 9.324 0.004 0.143 0.068 0.277 0.178 0.369 0.313 0.265 0.459 0.601 0.459 1.057 0 0.801-0.427 1.786-1.201 2.772-0.037 0.047-0.065 0.101-0.084 0.158-0.8 2.536-2.236 4.775-3.938 6.145-0.144 0.116-0.212 0.302-0.178 0.483 0.278 1.451 1.207 3.44 4.057 4.679 0.337 0.146 0.86 0.26 1.523 0.403 2.477 0.536 6.622 1.435 7.639 5.232 0.060 0.223 0.262 0.37 0.482 0.37 0.043 0 0.086-0.006 0.13-0.017 0.267-0.072 0.425-0.346 0.354-0.613-1.175-4.387-5.871-5.404-8.393-5.95-0.585-0.127-1.090-0.236-1.336-0.344-1.86-0.808-3.006-2.039-3.411-3.665 1.727-1.483 3.172-3.771 3.998-6.337 0.877-1.14 1.359-2.314 1.359-3.317 0-0.669-0.216-1.227-0.644-1.663-0.238-5.604-4.237-10.017-9.2-10.088l-0.149-0.002c-4.873 0.026-8.889 4.323-9.24 9.83-0.626 0.46-0.944 1.105-0.944 1.924 0 1.183 0.669 2.598 1.84 3.896 0.809 2.223 2.063 4.176 3.556 5.543-0.403 1.632-1.55 2.867-3.414 3.676-0.241 0.105-0.721 0.22-1.277 0.352-2.541 0.604-7.269 1.729-8.453 6.147-0.071 0.267 0.087 0.54 0.354 0.612z"></path>
                    </svg>
                    <h4><span class="counter">17</span></h4>
                    <h6>New Users</h6>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-lg-2 col-md-3 mt-24">
                <div class="widget widget-sm h-full">
                    <svg fill="#000" viewBox="0 0 37 32">
                        <path d="M7.5 0h-6c-0.869 0-1.5 0.631-1.5 1.5v29c0 0.869 0.631 1.5 1.5 1.5h34c0.869 0 1.5-0.631 1.5-1.5v-29c0-0.869-0.631-1.5-1.5-1.5h-28zM1 30.5v-29c0-0.313 0.187-0.5 0.5-0.5h5.5v30h-5.5c-0.313 0-0.5-0.187-0.5-0.5zM8 31v-30h21v30h-21zM36 1.5v29c0 0.313-0.187 0.5-0.5 0.5h-5.5v-30h5.5c0.313 0 0.5 0.187 0.5 0.5zM14.777 10.084c-0.153-0.102-0.351-0.112-0.514-0.025-0.161 0.087-0.263 0.256-0.263 0.441v12c0 0.185 0.102 0.354 0.264 0.441 0.074 0.039 0.155 0.059 0.236 0.059 0.097 0 0.193-0.028 0.277-0.084l9-6c0.139-0.093 0.223-0.249 0.223-0.416s-0.084-0.323-0.223-0.416l-9-6zM15 21.566v-10.132l7.599 5.066-7.599 5.066zM5 8h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5zM3 5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5zM5 12h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5zM5 16h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5zM5 20h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5zM5 24h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5zM5 28h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5zM32 9h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5zM32 5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5zM32 13h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5zM32 17h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5zM32 21h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5zM32 25h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5zM34 28h-2c-0.276 0-0.5 0.224-0.5 0.5s0.224 0.5 0.5 0.5h2c0.276 0 0.5-0.224 0.5-0.5s-0.224-0.5-0.5-0.5z"></path>
                    </svg>
                    <h4><span class="counter">901</span></h4>
                    <h6>Videos Uploaded</h6>
                </div>
            </div>

            <div class="col-md-4">

                <div class="panel widget-chart-3 panel-light">
                    <div class="panel-header border-0">
                        <h3 class="panel-title">Traffic By Country</h3>
                    </div>
                    <div class="panel-body pt-0">

                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-6 widget-chart">
                                <div id="chart-7" style="height: 150px; "></div>
                            </div>
                            <ul class="col-lg-6 col-md-12 col-6 chart-details">
                                <li> <i class="fa fa-circle" style="color: #4cacff;"></i> USA: <strong>34,500</strong></li>
                                <li> <i class="fa fa-circle" style="color: #5780f7;"></i> Europe: <strong>9,500</strong></li>
                                <li> <i class="fa fa-circle" style="color: #06c48c;"></i> Asia: <strong>4,500</strong></li>
                                <li> <i class="fa fa-circle" style="color: #fab72b;"></i> Other: <strong>1,500</strong></li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

        </div>


        <div class="row">

            <div class="col-md-6">

                <!-- Twitter Feed -->
                <div class="panel panel-light">
                    <div class="panel-header border-0">
                        <h1 class="panel-title">
                            <i class="fab fa-twitter"></i>
                            Twitter Feed
                        </h1>
                        <div class="panel-toolbar">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-sm btn-info-lightened">View Profile</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body p-0">

                        <ul class="list-group twitter-feed-widget">
                            <li class="list-group-item">
                                <div class="item-info">
                                    <img src="../../assets/avatars/22.jpg" class="avatar rounded-circle" alt="Avatar image">
                                    <div class="user-info">
                                        <h6 class="mb-0">Keon Boyer</h6>
                                        <a href="#">@keonb</a>
                                    </div>
                                </div>
                                <div class="item-body">
                                    <p>
                                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    </p>
                                    <small class="text-muted">10:12</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="item-info">
                                    <img src="../../assets/avatars/22.jpg" class="avatar rounded-circle" alt="Avatar image">
                                    <div class="user-info">
                                        <h6 class="mb-0">Keon Boyer</h6>
                                        <a href="#">@keonb</a>
                                    </div>
                                </div>
                                <div class="item-body">
                                    <p>
                                        Maiores est impedit, beatae iusto deserunt molestias Neque dolores rem animi laudantium tenetur.
                                    </p>
                                    <small class="text-muted">10:12</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="item-info">
                                    <img src="../../assets/avatars/22.jpg" class="avatar rounded-circle" alt="Avatar image">
                                    <div class="user-info">
                                        <h6 class="mb-0">Keon Boyer</h6>
                                        <a href="#">@keonb</a>
                                    </div>
                                </div>
                                <div class="item-body">
                                    <p>
                                            culpa magnam dicta similique aliquam in necessitatibus optio sunt, maiores est impedit, beatae iusto deserunt molestias.
                                    </p>
                                    <small class="text-muted">10:12</small>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div><!-- / Twitter Feed -->

            </div>

            <div class="col-md-6 mt-24">

                <div class="row no-gutters h-full shadow-sm widgets-rounded">

                    <div class="col-md-6">

                        <div class="widget-chart-6 h-full">
                            <div class="widget-header">
                                <h5 class="widget-title">Projects Progress</h5>
                                <h6 class="widget-subtitle">Level 1 project</h6>
                            </div>
                            <div class="widget-chart">
                                <div class="radial-progress text-center" data-value="75%">
                                    <svg  xmlns="http://www.w3.org/2000/svg" height="200" width="200" viewBox="0 0 200 200" data-value="40">
                                        <path stroke="#e9eefe" d="M41 149.5a77 77 0 1 1 117.93 0"  fill="none"/>
                                        <path stroke="#5780f7" d="M41 149.5a77 77 0 1 1 117.93 0" fill="none" stroke-dasharray="350" stroke-dashoffset="350"/>
                                    </svg>
                                </div>
                            </div>
                            <h6 class="widget-name">Medical Clinic</h6>
                            <div class="widget-description">
                                <a href="#" class="btn btn-rounded btn-secondary-light">View</a>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="widget-chart-6 h-full bg-secondary-lightened">
                            <div class="widget-header">
                                <h5 class="widget-title">Projects Progress</h5>
                                <h6 class="widget-subtitle">Level 1 project</h6>
                            </div>
                            <div class="widget-chart">
                                <div class="radial-progress text-center" data-value="75%">
                                    <svg  xmlns="http://www.w3.org/2000/svg" height="200" width="200" viewBox="0 0 200 200" data-value="40">
                                        <path stroke="#e9eefe" d="M41 149.5a77 77 0 1 1 117.93 0"  fill="none"/>
                                        <path stroke="#5780f7" d="M41 149.5a77 77 0 1 1 117.93 0" fill="none" stroke-dasharray="350" stroke-dashoffset="350"/>
                                    </svg>
                                </div>
                            </div>
                            <h6 class="widget-name">Medical Clinic</h6>
                            <div class="widget-description">
                                <a href="#" class="btn btn-rounded btn-secondary-light">View</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

            <div class="col-md-12">

                <!-- Table With Algolia Search -->
                <div class="panel panel-light">
                    <div class="panel-header">
                        <h3 class="panel-title">
                            <i class="fab fa-algolia"></i>
                            Exon Datatable With Algolia Search</h3>
                    </div>
                    <div class="panel-body pb-2">
                        <div class="table-1"></div>
                    </div>
                </div><!-- / Table With Algolia Search -->

            </div>

            <div class="col-md-6">

                <div class="panel panel-light">
                    <div class="panel-header">
                        <h1 class="panel-title">Mini Timeline</h1>
                    </div>
                    <div class="panel-body">

                        <div class="timeline-mini">
                            <ul>
                                <li>
                                    <div class="tl-badge bg-success"></div>
                                    <h6 class="tl-title">01</h6>
                                    <p class="tl-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi natus obcaecati beatae est.</p>
                                </li>
                                <li>
                                    <div class="tl-badge bg-primary"></div>
                                    <h6 class="tl-title">02</h6>
                                    <p class="tl-content">Quae laudantium, porro dolore sunt eos blanditiis inventore minus ipsum veritatis nostrum saepe magnam, aliquam veniam. Minima.</p>
                                </li>
                                <li>
                                    <div class="tl-badge bg-primary"></div>
                                    <h6 class="tl-title">03</h6>
                                    <p class="tl-content">Corporis esse delectus labore nam molestias vitae consequuntur.</p>
                                </li>
                                <li>
                                    <div class="tl-badge bg-primary"></div>
                                    <h6 class="tl-title">04</h6>
                                    <p class="tl-content">Perspiciatis eum corrupti quia sed adipisci modi soluta maxime voluptatum libero, ut sapiente molestiae sint quidem vel quasi dignissimos quibusdam assumenda.</p>
                                </li>
                                <li>
                                    <div class="tl-badge bg-info"></div>
                                    <h6 class="tl-title">05</h6>
                                    <p class="tl-content">Perspiciatis eum corrupti quia sed adipisci modi soluta maxime voluptatum libero, ut sapiente molestiae sint quidem vel quasi dignissimos quibusdam assumenda.</p>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-3">

                <!-- Reviews -->
                <div class="panel panel-light">
                    <div class="panel-header border-0">
                        <h1 class="panel-title">Reviews</h1>
                        <div class="panel-toolbar">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-sm btn-info-lightened">ADD</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body p-0">

                        <ul class="list-group contact-list-widget">
                            <li class="list-group-item">
                                <div class="user-avatar">
                                    <img src="../../assets/avatars/5.jpg" class="avatar avatar-1 rounded-circle" alt="Avatar image">
                                    <span class="badge badge-success color-badge badge-size-1"></span>
                                </div>
                                <div class="list-item-info">
                                    <a href="#"><h6 class="mb-0">Thea Reichert</h6></a>
                                    <div class="stars d-block my-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <small class="mt-1 d-block text-truncate" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                                    <small class="text-muted">10:12</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="user-avatar">
                                    <img src="../../assets/avatars/18.jpg" class="avatar avatar-1 rounded-circle" alt="Avatar image">
                                    <span class="badge badge-secondary color-badge badge-size-1"></span>
                                </div>
                                <div class="list-item-info">
                                    <a href="#"><h6 class="mb-1">Leone Gutkowski</h6></a>
                                    <div class="stars d-block my-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <small class="mt-1 d-block text-truncate" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                                    <small class="text-muted">10:12</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="user-avatar">
                                    <img src="../../assets/avatars/14.jpg" class="avatar avatar-1 rounded-circle" alt="Avatar image">
                                    <span class="badge badge-secondary color-badge badge-size-1"></span>
                                </div>
                                <div class="list-item-info">
                                    <a href="#"><h6 class="mb-1">Sterling Robel</h6></a>
                                    <div class="stars d-block my-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <small class="mt-1 d-block text-truncate" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                                    <small class="text-muted">10:12</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="user-avatar">
                                    <img src="../../assets/avatars/22.jpg" class="avatar avatar-1 rounded-circle" alt="Avatar image">
                                    <span class="badge badge-secondary color-badge badge-size-1"></span>
                                </div>
                                <div class="list-item-info">
                                    <a href="#"><h6 class="mb-1">Keon Boyer</h6></a>
                                    <div class="stars d-block my-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <small class="mt-1 d-block text-truncate" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                                    <small class="text-muted">10:12</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="user-avatar">
                                    <img src="../../assets/avatars/6.jpg" class="avatar avatar-1 rounded-circle" alt="Avatar image">
                                    <span class="badge badge-success color-badge badge-size-1"></span>
                                </div>
                                <div class="list-item-info">
                                    <a href="#"><h6 class="mb-1">Roger Aniston</h6></a>
                                    <div class="stars d-block my-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <small class="mt-1 d-block text-truncate" style="font-weight: 400;">Lorem ipsum dolor sit amet consectetur adipisicing elit.</small>
                                    <small class="text-muted">10:12</small>
                                </div>
                            </li>
                        </ul>

                    </div>
                </div><!-- / Reviews -->

            </div>

            <div class="col-md-3">

                <!-- Short List -->
                <div class="panel panel-light">
                    <div class="panel-header">
                        <h1 class="panel-title">
                            <svg style="height: 16px;" viewBox="0 0 32 32"><path d="M 16 5 C 12.144531 5 9 8.144531 9 12 C 9 14.410156 10.230469 16.550781 12.09375 17.8125 C 8.527344 19.34375 6 22.882813 6 27 L 8 27 C 8 22.570313 11.570313 19 16 19 C 20.429688 19 24 22.570313 24 27 L 26 27 C 26 22.882813 23.472656 19.34375 19.90625 17.8125 C 21.769531 16.550781 23 14.410156 23 12 C 23 8.144531 19.855469 5 16 5 Z M 16 7 C 18.773438 7 21 9.226563 21 12 C 21 14.773438 18.773438 17 16 17 C 13.226563 17 11 14.773438 11 12 C 11 9.226563 13.226563 7 16 7 Z"/></svg>
                            Users List
                        </h1>
                        <div class="panel-toolbar">
                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                <button type="button" class="btn btn-sm btn-primary-lightened">VIEW ALL</button>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body p-0">

                        <ul class="list-group list-group-widget-short">
                            <li class="list-group-item">
                                <div class="item-img">
                                    <img src="../../assets/avatars/8.jpg" class="avatar rounded-circle" alt="Avatar image">
                                </div>
                                <div class="item-info">
                                    <h6>Johann Haag</h6>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="item-img">
                                    <img src="../../assets/avatars/5.jpg" class="avatar rounded-circle" alt="Avatar image">
                                </div>
                                <div class="item-info">
                                    <h6>Nova Bernier</h6>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="item-img">
                                    <img src="../../assets/avatars/19.jpg" class="avatar rounded-circle" alt="Avatar image">
                                </div>
                                <div class="item-info">
                                    <h6>Augustine Zemlak</h6>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="item-img">
                                    <img src="../../assets/avatars/21.jpg" class="avatar rounded-circle" alt="Avatar image">
                                </div>
                                <div class="item-info">
                                    <h6>Wanda Auer</h6>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="item-img">
                                    <img src="../../assets/avatars/14.jpg" class="avatar rounded-circle" alt="Avatar image">
                                </div>
                                <div class="item-info">
                                    <h6>Sterling Robel</h6>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="item-img">
                                    <img src="../../assets/avatars/5.jpg" class="avatar rounded-circle" alt="Avatar image">
                                </div>
                                <div class="item-info">
                                    <h6>Nova Bernier</h6>
                                </div>
                            </li>
                            <li class="list-group-item list-group-item-link">
                                <a href="#" class="btn btn-has-icon btn-outline-dark">
                                    <span class="icon">
                                        <i class="fas fa-plus"></i>
                                        <!-- <svg xmlns="http://www.w3.org/2000/svg" style="width: 1.15em;" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> -->
                                    </span>
                                    <span>Add New User</span>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div><!-- / Short List -->

            </div>

        </div>



    </div><!-- / .page-content -->
    <!-- Main Page Content -->

@include('admin.inc.footer')
