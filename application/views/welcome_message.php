<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>Do Me</title>


  <?php $this->load->view('dependencies'); ?>
</head>
<body >

  <!--div id="index-banner" class="parallax-container" style=" background-image: url('forest.jpg');">
    <div class="section no-pad-bot">
      <a href="hackup-index.html"><div class="header-text" style="background-image: url(img/title400.png); margin-top: -70px; z-index: 1;"></div></a>
    </div>
  </div-->
<!--News-->



<div class="section scrollspy" id="news">
    <div class="container">
        <div class="row">
             <div class="col s12 m5 l8">
                 <h3>Do Me</h3>
                 A list to remind you to do stuff.<br><br>

                 <ul id="dropdown2" class="dropdown-content grey">
                    <li><a href="index.php?category=0">All</a></li>
                  <?php
                      $categoryArray = array();
                      $dbc = mysqli_connect('localhost', 'root', '', 'do_me');
                                  $query = "SELECT id, category_name
                                            FROM category";
                                  $data = mysqli_query($dbc, $query);

                                  for ($i = 0; $i < mysqli_num_rows($data); $i++)
                                  {
                                    $row = mysqli_fetch_array($data);
                                    array_push($categoryArray, $row ['category_name']);
                                    echo '<li><a href="index.php?category='.$row['id'].'">'.$row['category_name'].'</a></li>';
                                  }



                  ?>
                 </ul>


                 <button data-target = "modal1" id="download-button" class="waves-effect waves-light btn deep-purple darken-2 modal-trigger">+ DO</button>
                  <!-- Modal Structure -->
                    <div id="modal1" class="modal modal-fixed-footer">
                      <div class="modal-content">

                              <h4>What'cha wanna do?</h4>
                                <div class="row">
                                     <div class="col s12 m5 l12">
                                            <form class="col s12" method="post" id="add_form" action="index.php/do_controller/addDo" >
                                                <div class="row">
                                                 <div class="input-field col s12">
                                                    <input name="titleInput" type="text" class="browser-default">
                                                    <label for="titleInput">Title</label>
                                                 </div>
                                               </div>

                                                 <div class="row">
                                                  <div class="input-field col s6">
                                                    <select name="categoryInput">
                                                      <option value="" disabled selected>Choose a category</option>
                                                      <option value="1">Work</option>
                                                      <option value="2">Family</option>
                                                      <option value="3">School</option>
                                                      <option value="4">Health</option>
                                                    </select>
                                                    <label>Category</label>
                                                  </div>

                                                  <div class="input-field col s6">
                                                    <label for="date-picker">Date</label>
                                                    <input type="text" name="dateInput" class="datepicker">
                                                  </div>
                                                </div>
                                                <div class="row">
                                                 <div class="input-field col s12">
                                                    <textarea name="contentInput" class="materialize-textarea"></textarea>
                                                    <label for="contentInput">Content</label>
                                                </div>
                                              </div>

                                              <!-- footer TODO -->
                                              <div class="modal-footer">
                                                <a href="javascript: submitAddForm();" class=" modal-action modal-close waves-effect waves-purple btn-flat" type="submit" name="action" style="color:purple">DO</input>
                                                <a href="#!" class=" modal-action modal-close waves-effect waves-gray btn-flat" style="color:purple">DO NOT</a>
                                                <a href="#!" class="btn-flat disabled">TRY</a>
                                              </div>
                                              </form>

                                        </div>
                                    </div>

                    </div>

                    </div>
            </div>

            <div class="col s12 m1 l4">
                  <!--nav class="grey ">
                    <div class="nav-wrapper"  >
                      <form>
                        <div class="input-field">
                          <input id="search" type="search" required>
                          <label for="search"><i class="material-icons">search</i></label>
                          <i class="material-icons">close</i>
                        </div>
                      </form>
                    </div>
                  </nav-->
                  <br><br><br><br><br><br>
                  <a class="btn dropdown-button grey darken-2" href="#!" data-activates="dropdown2">
                      <?php
                      $chosenCategName = "All";
                      $categ_id = '0';
                      if (isset($_GET["category"]))
                      {
                        $categ_id = $_GET["category"];

                        if($categ_id !='0'){

                            $query = "SELECT id, category_name
                                  FROM category
                                  WHERE id = ".$categ_id;

                            $data = mysqli_query($dbc, $query);

                            $row = mysqli_fetch_array($data);
                            $chosenCategName = $row['category_name'];
                          }
                      }

                      echo $chosenCategName;

                      ?>
                    <i class="mdi-navigation-arrow-drop-down right"></i></a>

            </div>
        </div>
       <div class="row">
        <ul id="staggered-test">
          <?php
            $dbc = mysqli_connect('localhost', 'root', '', 'do_me');
            if($categ_id == '0')
                    {
                      $query = "SELECT category_name, title, content
                                FROM category, note
                                WHERE category_id = category.id";
                    }
            else {
                      $query = "SELECT category_name, title, content
                                FROM category, note
                                WHERE category_id = category.id AND category_id = ".$categ_id;
                  }
            $data = mysqli_query($dbc, $query);

            for ($i = 0; $i < mysqli_num_rows($data); $i++) {



              $row = mysqli_fetch_array($data);

              echo '<li><div class="card">
                      <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4"><b class="activator">'
                      .$row['title']
                      .'</b><i class="mdi-navigation-more-vert right"></i></span>
                          <p>'
                      .$row['category_name']
                      .'</p>
                      </div>
                      <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4">'
                      .$row['title']
                      .'<i class="mdi-navigation-close right"></i></span>
                          <p>'
                      .$row['content']
                      .'</p>
                      </div>
                      <div class="card-action right-align">
                        <a href="#" class="grey-text text-darken-3">Edit</a>
                        <a href="#" class="grey-text text-darken-3">Delete</a>
                        <a href="#" class="purple-text">Done!</a>
                      </div>
                  </div></li>      '
              ;
          }
        ?>
      </ul>
        </div>
    </div>
    </div>
</div>

<!--div style= "margin-left: 500px">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect"><a href="#!">5</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
          </ul>
        </div-->


 <footer class="page-footer deep-purple ">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Contact Us</h5>
          <p class="grey-text text-lighten-4">For any questions or concerns, you may contact us by messaging us. Your questions matter to us. We hope to provide better service for you. Thank you.</p>


        </div>
            <div class="col l6 s12">
                <form class="col s12" action="contact.php" method="post">
                    <div class="row">
                        <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix white-text"></i>
                            <input id="icon_prefix" name="name" type="text" class="validate white-text">
                            <label for="icon_prefix" class="white-text">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <i class="mdi-communication-email prefix white-text"></i>
                            <input id="icon_email" name="email" type="email" class="validate white-text">
                            <label for="icon_email" class="white-text">Email-id</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix white-text"></i>
                            <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text"></textarea>
                            <label for="icon_prefix2" class="white-text">Message</label>
                        </div>
                        <div class="col offset-s7 s5">
                            <button class="btn waves-effect waves-light red darken-1" type="submit">Submit
                                <i class="mdi-content-send right white-text"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

      </div>
    </div>
    <div class="footer-copyright">

    </div>
  </footer>


  <!--  Scripts-->
  <script src="js/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script type="text/javascript">
     $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
          Materialize.showStaggeredList('#staggered-test');
          $('.modal-trigger').leanModal();

          $('select').material_select();
       });

      $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15 // Creates a dropdown of 15 years to control year
      });

      function submitAddForm(){
        $('#add_form').submit();
      }
  </script>
  </body>
</html>
