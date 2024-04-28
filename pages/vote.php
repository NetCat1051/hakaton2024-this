<?
	if(!CheckActive())
	{
		echo "<script>window.location.href = 'https://ht.rzce.ru/reg'</script>";
	}
?>

<content class="vote">
	<div class="title">
		Внеси свой вклад в развитие туризма
	</div>
	<div class="flex">
		<div class="select">
			<div class="custom-select">
				<select>
					<option value="0">Выберите регион</option>
					<?
						$RF = Mysql("SELECT `id`, `name` FROM `ways`");
						while($Row = $RF->fetch_assoc())
						{
							echo "<option value='".$Row["id"]."'>".$Row["name"]." - ".$Row["id"]."</option>";
						}
					?>
				</select>
			</div>
			<div class="sendvote" onclick="OpenVoteMenu()">
				Проголосовать
			</div>
		</div>
	</div>
	<div class="votemenu">
		<div class="block">
			<div class="title">Голосование за субъект</div>
			<div class="subtitle">Оплата голоса(ов) / 1 Голос = 100р</div>
			<input id="i" class="textarea" type="number" size="40" onchange="$('#money').html('Итого: ' + (Number($('#i').val()) * 100) + 'р')">
			<div style="display: flex;justify-content: space-between;">
				<div id="money" class="subtitle">Итого: 0р</div>
				<div class="send" onclick="SendVote()">
					Оплатить
				</div>
			</div>
		</div>
	</div>
</content>

<script>
	function SendVote()
	{
		Notify("Перенаправление на кассу", null, null, "info");
		$.getJSON("/api/addVotes&region=" + $("select").val() + "&votes=" + $('#i').val(), function(Data)
		{
			
		});
		setTimeout(() => {
			Notify("Ваш голос был зачтен!", null, null, "success");
		}, 1000);
	}

	function OpenVoteMenu()
	{
		$(".votemenu").addClass("active");
	}
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
			SetBackground("subjects/" + i);
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>