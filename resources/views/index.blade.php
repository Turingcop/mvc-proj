@include('header')

<h2 class="center">Tärningsutfall i samtliga kast & spel</h2>
<canvas id="diceChart" class="chart-canvas"></canvas>

<h2 class="center">Tärningshänders snittvärden över samtliga spel</h2>
<canvas id ="handChart" class="chart-canvas round"></canvas>

<script>
    const diceData = <?php echo json_encode($count) ?>;
    const handData = <?php echo json_encode(array_values($hands)) ?>;
</script>
<script src="js/yatzyhist.js"></script>
@include('footer')