

<style>
      *{
        margin:0; padding:0;
        box-sizing: border-box;
        font-family:Arial, Helvetica;
       /* text-transform: capitalize; */
        text-decoration: none;
      }

      body{
        min-height: 100vh;

        background-size: cover;
        background-position:center;
     }

     header{
      position: fixed;
      top:0px; left:0; right: 0;
      background:#EFCDA8;
      box-shadow: 0 5px 10px rgba(0,0,0,.1);
      padding:0px 7%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      z-index: 1000;
     }

      header .logo{
        font-weight:bolder;
        font-size: 25px;
        color: #333;

      }

      header .navbar ul{
         list-style: none;
         
      }

      header .navbar ul li{
        position: relative;
        float: left;
      }

      header .navbar ul li a{
        font-size: 20x;
        padding:20px;
        color: #333;
        display: block;
      }

      header .navbar ul li a:hover{
       background: #333;
       color: #fff;
      }
      
      header .navbar ul li ul{
        position: absolute;
        left:0;
        width:200px;
        background: #fff;
        display: none;
      }

      header .navbar ul li ul li{
        width:100%;
        border-top: 1px solid rgba(0,0,0,.1);
      }

      header .navbar ul li ul li ul{
        left:200px;
        top:0;
      }
      header .navbar ul li:focus-within > ul,
      header .navbar ul li:hover > ul{
       display: initial;
      }
      
      #menu-bar{
        display: none;
      }

      header label{
        font-size: 20px;
        color: #333;
        cursor: pointer;
        display: none;
        
      }

      a:hover{
        text-decoration:none;
      }

      



      @media(max-width:991px){

        header{
          padding:20px;
        }

        header label{
          display: initial;
        }

        header .navbar{
          position: absolute;
          top: 100%; left:0; right:0;
          background: #fff;
          border-top: 1px solid rgba(0,0,0,.1);
          display:none;
        }

        header .navbar ul li{
          width:100%;
        }

        header .navbar ul li ul{
          position:relative;
          width: 100%;

        }

        header .navbar ul li ul li{
          background: #eee;
        }

        header .navbar ul li ul li ul{
          width:100%;
          left: 0;
        }

        #menu-bar:checked~.navbar{
          display: initial;
        }
      }
    </style>


<header>
  <img src="dev_images/d20.png" alt="lel" />
  <input type="checkbox" id="menu-bar">
  <label for="menu-bar">Menu</label>


    <nav class="navbar">
      <ul>
        <li><a href="admin_page.php">Home</a></li>
          
          <li><a href="#">Membership</a>
             <ul>
              <li><a href="view_family_members.php">View Users</a></li>
              <li><a href="register_family_member.php">Register User</a></li>
              <li><a href="search_member.php">Search User</a></li>
             </ul>
        </li>
          
           <li><a href="#">Dairy Farm</a>
             <ul>
              <li><a href="view_registered_cows.php">Registered Cows</a></li>
              <li><a href="register_cow.php">Register Cow</a></li>
              <li><a href="search_cow.php">Search Cow</a></li>
             </ul>
        </li>

        <li><a href="#">Vaccination</a>
             <ul>
              <li><a href="view_vaccination.php">View Vaccinations</a></li>
              <li><a href="register_vaccination.php">Register Vaccination</a></li>
             </ul>
        </li>

        <li><a href="#">Inseminations</a>
             <ul>
              <li><a href="view_insemination.php">View Inseminations</a></li>
              <li><a href="register_insemination.php">Register Insemination</a></li>
             </ul>
        </li>

             <li><a href="#">Milk Production</a>
             <ul>
              <li><a href="view_production.php">View Production</a></li>
              <li><a href="register_production.php">Register Production</a></li>
             </ul>
        </li>

          
           <li><a href="#">Notes</a>
             <ul>
              <li><a href="view_notes.php">View Notes</a></li>
              <li><a href="add_notes.php">Add Note</a></li>
             </ul>
        </li>


        <li><a href="change_password.php">Change Password</a></li>

        <li><a href="logout.php">Log Out</a></li>
  
    </li> 
</header>