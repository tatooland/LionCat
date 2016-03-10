      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="page_candy/theme/assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">Marcel Newman</h5>              	  	
                  <li class="mt">
                      <a class="" href="index.html">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <?php

                  		foreach($menu as $m){
							if($m->t=="group"){
								$label=$m->l;
								
									$str="";
									foreach($m->o as $item){
										$itLabel=$item->l;
										$itLink=$item->link."&token=".$_GET['token'];
										if($itLabel==$childLabel)
											$str.="<li class='active'><a href='$itLink'>$itLabel</a></li>";	
										else 
											$str.="<li><a href='$itLink'>$itLabel</a></li>";
									}
								if($m->l==$parentLabel){
									echo "<li class='sub-menu dcjq-parent-li'>
											<a class='active dcjq-parent' href='javascript:;'><i class=' fa fa-bar-chart-o'></i>$label</a>
										<ul class='sub'>
											$str
										</ul>
										</li>
									";
								}else{
									echo "<li class='sub-menu'>
											
											<a href='javascript:;'><i class=' fa fa-bar-chart-o'></i>$label</a>
										
										<ul class='sub'>
											$str
										</ul>
										</li>
									";
								}
							}else if($m->t=="single"){
								$label=$m->l;
								if(isset($m->link)){
									$link=$m->link."&token=".$_GET['token'];
									if($m->l==$parentLabel){
										echo "<li class='sub-menu'>
												<a class='active' href='$link'><i class=' fa fa-bar-chart-o'></i>$label</a>
											
											<ul class='sub'>
												
											</ul>
											</li>
										";
									}else{
										echo "<li class='sub-menu'>
												<a href='$link'><i class=' fa fa-bar-chart-o'></i>$label</a>
											<ul class='sub'>
												
											</ul>
											</li>
										";
									}
								}else{
									if($m->l==$parentLabel){
										echo "<li class='sub-menu'>
												<a class='active' href='javascript:;'><i class=' fa fa-bar-chart-o'></i>$label</a>
											</li>
											<ul class='sub'>
												
											</ul>
										";
									}else{
										echo "<li class='sub-menu'>
												<a><i class=' fa fa-bar-chart-o'></i>$label</a>
											<ul class='sub'>
												
											</ul>
										</li>
										";
									}
								}
							}
						}

                  ?>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>