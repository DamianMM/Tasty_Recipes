<!-- COMMENT SECTION LEFT UP -->
<div class="leftup">
    <img src="<?php echo base_url('resources/pictures/food.jpg') ?>" alt="food" class="index-imageleft">
    <h3> Welcome to Tasty Recipes <?php if (isset($this->session->userdata['logged_in'])) echo $this->session->userdata['logged_in']['alias'] ?>!</h3>

    <p> This is a site where you can learn how to cook!<br>
        Use the buttons above to browse the site. <br>
    </p>
    <p> Good luck! </p>
</div>


<!-- COMMENT SECTION LEFT DOWN -->
<div class="leftdown">
    <p class="bigger-p"> This site was made by Damian Martinez for the course ID1354</p>
    <p class="bigger-p"> I hope you enjoy it! </p>
    <img src="<?php echo base_url('resources/pictures/knifenfork.jpg')?>" alt="Knife and Fork" class="index-imageleftdown">

</div>

<!-- COMMENT SECTION RIGHT -->
<div class="right">
    <img src="<?php echo base_url('resources/pictures/chef.jpg')?>" alt="A chef" class="index-imageright">
</div>