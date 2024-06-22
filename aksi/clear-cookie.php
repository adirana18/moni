<!-- Menghapus Cookie -->
  <?php  

        setcookie("emailPos", "", time() - 31536000, "/"); 
        setcookie("passPos", "", time() - 31536000, "/"); 
        echo '
          <script>
            document.location.href="../";
          </script>
        ';

  ?>