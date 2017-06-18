	<footer>
	<p id="credit" onClick="wow()">
	© vbargues - mfranc
	</p>
	</footer>
	</body>
</html>

<script>
i = 0
function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++ ) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }
function wow()
{
	i++
	if (i == 3) {
		document.body.style.background = 'pink';
		document.body.style.color = 'yellow';
		document.getElementsByTagName('header')[0].style.background = 'purple';
		document.getElementsByTagName('footer')[0].style.background = 'purple';
		document.getElementById('navbar').style.background = 'chartreuse';
		setTimeout(wowow, 2000);
	}
}
function wowow()
{
		document.body.style.background = getRandomColor();
		document.body.style.color = getRandomColor();
		document.getElementsByTagName('header')[0].style.background = getRandomColor();
		document.getElementsByTagName('footer')[0].style.background = getRandomColor();
		document.getElementById('navbar').style.background = getRandomColor();	
		setTimeout(wowow, 2000);
}
</script>