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

                 
                 <ul id="dropdown2" class="dropdown-content grey">
                    <li><a href="#!">All</a></li>
                    <li><a href="#!">Work</a></li>
                    <li><a href="#!">School</a></li>
                    <li><a href="#!">Health</a></li>
                 </ul>

  
                 <button data-target = "modal1" id="download-button" class="waves-effect waves-light btn deep-purple darken-2 modal-trigger">+ DO</button> 
                  <!-- Modal Structure -->
                    <div id="modal1" class="modal">
                      <div class="modal-content">
                        <h4>Modal Header</h4>
                        <p>A bunch of text</p>
                      </div>
                      <div class="modal-footer">
                        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
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
                  <br><br><br><br>
                  <a class="btn dropdown-button grey darken-2" href="#!" data-activates="dropdown2">All<i class="mdi-navigation-arrow-drop-down right"></i></a>
     
            </div>
        </div>
       <div class="row" id="todoList">
             <!-- 
          <?php
            $dbc = mysqli_connect('localhost', 'root', 'p@ssword', 'do_me');
            $query = "SELECT category_name, title, content
                      FROM category, note
                      WHERE category_id = category.id";
            $data = mysqli_query($dbc, $query);
            
          
            for ($i = 0; $i < mysqli_num_rows($data); $i++) {
              $row = mysqli_fetch_array($data);
          
              echo '<div class="card">
                      <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4"><b>'
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
                  </div>      '
              ;
          }
        ?>          
 -->
		<div class="card">
                      <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">
                          	<b class="noteTitle">Hey look at me I am title</b>
                          <i class="mdi-navigation-more-vert right"></i></span>
                          <p class="noteCategory">Hey I am category</p>
                      </div>
                      <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4">
                          	<div class="noteTitle2">Hi I am title again</div>
                          <i class="mdi-navigation-close right"></i></span>
                          <p class="noteContent">I am now content/message</p>
                      </div>
                  </div>

		<script type="text/javascript">
		$(document).ready(function(){
			var todoController = 'Welcome';
			var baseUrl = '<?php echo base_url() ?>';
			var todoClone = $(".card").clone();

			$(".card").remove();

			refreshTodos();

	        function refreshTodos(){
	                //$("#todoList").empty();

	                $.ajax({
						type: 'post',
	                    url: baseUrl + todoController + '/getNotes',
	                    dataType: "json",
	                    success: function (todos) {
	                        $.each(todos, function(index,todo){

	                            var toCopy = todoClone.clone();
	                    		alert(todo.title);

	                            toCopy.find(".noteTitle").text(todo.title);
	                            toCopy.find(".noteCategory").text(todo.category_name);
	                            toCopy.find(".noteTitle2").text(todo.title);
	                            toCopy.find(".noteContent").text(todo.content);

	                            toCopy.appendTo("#todoList").show();
	//                            toCopy.find("*:not(.content-panel):not(.companyInfoWrapper):not(button)").click(function(event){
	//                                var target = $(event.target);
	//                                if(target.hasClass("companyImage")){
	//                                    companyClick(target.siblings(".companyInfoWrapper").children("button").val());
	//                                }else if(target.hasClass("companyName")){
	//                                    companyClick(target.siblings("button").val());
	//                                }else{
	//                                    companyClick(target.parent().siblings("button").val());
	//                                }
	//                            });
	//                            toCopy.find(".companyInfoWrapper button").click(function(){
	//                                $("#editCompanyModal").modal("show");
	//                            });
	                            // toCopy.find(".btn").click(function(e){
	                            //     e.stopPropagation(); 
	                            // });
	                            // toCopy.click(function(){
	                            //     $(".modal").modal("toggle");
	                            // });
	                            // toCopy.appendTo("#todoList").show();
	                        });
	                    }
	                });
	            }
	        });

            </script>

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

  </body>
</html>