</div>
</div>
<div class="footer-wrap">
    &copy; 2020 developed by Vaishnavi Gupta under guidance of Mr.Anand Kr.Srivastava
</div>
</body>
</html>

<?php
$mysqli->close();
?>
<script>
$( document ).ready(function() {
    setInterval(() => {
    let date = new Date().toLocaleString();
    let splitDate = date.split(' ');
    document.getElementById('clockDisplay').innerText = splitDate[1] + ' ' + splitDate[2]
}, 1000)
});
</script>