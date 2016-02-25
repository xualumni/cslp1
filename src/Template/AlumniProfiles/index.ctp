<body>
    <!--Start of Whole wrapper -->
    <div id="wrapper">
        


    <!--Start of Top Navigation-->
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <!--Xavier Logo-->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html"><?php echo $this->Html->image('logo_side.png', array('alt' => 'CakePHP', 'width'=>'160px', 'height'=>'40px')); ?></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
                <!--Start of Settings -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="href="/users/login" class="fa fa-sign-out fa-lg""></i> 
                    </a>
                    <li><h5><a href="/users/login" class="fa fa-sign-out fa-lg"></a></h5></li>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
        </nav>
        <!--End of Top Navigation-->




    <!--Start of Side Navigation  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <a href="/AlumniProfiles/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="active-menu" href="/AlumniProfiles/index"><i class="fa fa-users"></i> Profiles</a>
                    <li>
                        <a href="/AlumniProfiles/import"><i class="fa fa-list-alt"></i> Import Data</a>
                    </li>
                </ul>
        </nav>
        <!--End of Side Navigation  -->
        

 <!--Start of Content -->      
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <!--Title and subtitle -->
                        <h1 class="page-header">Alumni Profiles <small>Summary of your Tables</small></h1>
                        <div class="row">    
                          

  <div class="col-lg-4">


<?php echo $this->Form->create();?>
      <div class="input-group">
      
      <?php  echo $this->Form->input('all', array('label'=>'', 'type'=>  'text', 'class'=>'form-control', 'placeholder'=>'Search for...'));?>
      <span class="input-group-btn">
        <?php   echo $this->Form->button('<i class="fa fa-search"></i>',  array('label' => 'First Name', "class"=>"btn btn-default", 'type'=>'submit'));?>
        <?php echo $this->Html->link('Reset', ['action' => 'index']);

    echo $this->Form->end();?>
      </span>
  </div>



  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->
                            <div class="row">
                                <div class="panel-body table-responsive">
                                    <table class="table table-hover">
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th><?= $this->Html->link('<i class="fa fa-plus"></i>', ['action' => 'add'], array ('escape' => false)) ?></th>
                                        </tr>
                                        <tr>
                                            <td><strong>First Name</strong></td>
                                            <td><strong>Middle Name</strong></td>
                                            <td><strong>Last Name</strong></td>
                                            <td><strong>Contact Number</strong></td>
                                            <td><strong>Email</strong></td>
                                            <td><strong>Street Address</strong></td>
                                            <td><strong>City</strong></td>
                                            <td><strong>Actions</strong></td>
                                            <td></td>
                                        </tr>
                                        
                                        <?php
                                        /*
                                            echo $this->Form->create();
                                            // You'll need to populate $authors in the template from your controller
                                            echo $this->Form->input('id');
                                            // Match the search param in your table configuration
                                            echo $this->Form->input('q');
                                            echo $this->Form->button('Filter', ['type' => 'submit']);
                                            echo $this->Html->link('Reset', ['action' => 'index']);
                                            echo $this->Form->end();
                                        */  


                                        ?>
  
                                        

                                        <?php foreach ($alumniprofile as $alumniprofile): ?>
                                        

                                        

                                        <tr>
                                            <td><?= $alumniprofile->fname ?></td>
                                            <td><?= $alumniprofile->mname ?></td>
                                            <td><?= $alumniprofile->lname ?></td>
                                            <td><?= $alumniprofile->contact_number ?></td>
                                            <td><?= $alumniprofile->email ?></td>
                                            <td><?= $alumniprofile->street_address ?></td>
                                            <td><?= $alumniprofile->city ?></td>
                                            <td>
                                                <?= $this->Html->link('<i class="fa fa-search-plus"></i>', ['action' => 'view', $alumniprofile->id], array ('escape' => false) ); ?>&nbsp;&nbsp;
                                                <?= $this->Html->link('<i class="fa fa-pencil-square-o"></i>', ['action' => 'edit', $alumniprofile->id], array ('escape' => false)) ?>&nbsp;&nbsp;   
                                                <?= $this->Form->postLink(
                                                    '<i class="fa fa-trash"></i> ',
                                                    ['action' => 'delete', $alumniprofile->id],
                                                    [
                                                        'escape' => false,
                                                        'action' => 'delete', $alumniprofile->id
                                                    ])
                                                ?>
                                            </td>
                                            <td></td>
                                        </tr>
                                   
                                        <?php endforeach; ?>
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End of Content -->
    

    </div>
    <!--End of Whole wrapper -->


</body>
</html>
    