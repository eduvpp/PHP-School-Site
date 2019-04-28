var vanillacalendar = {
  month: document.querySelectorAll('[data-calendar-area="month"]')[0],
  next: document.querySelectorAll('[data-calendar-toggle="next"]')[0],
  previous: document.querySelectorAll('[data-calendar-toggle="previous"]')[0],
  label: document.querySelectorAll('[data-calendar-label="month"]')[0],
  activeDates: null,
  date: new Date(),
  todaysDate: new Date(),

  init: function (options) {
    this.options = options
    this.date.setDate(1)
    this.createMonth()
    this.createListeners()
  },

  createListeners: function () {
    var _this = this
    this.next.addEventListener('click', function () {
      _this.clearCalendar()
      var nextMonth = _this.date.getMonth() + 1
      _this.date.setMonth(nextMonth)
      _this.createMonth()
    })
    // Clears the calendar and shows the previous month
    this.previous.addEventListener('click', function () {
      _this.clearCalendar()
      var prevMonth = _this.date.getMonth() - 1
      _this.date.setMonth(prevMonth)
      _this.createMonth()
    })
  },

  createDay: function (num, day, year) {
    var newDay = document.createElement('div')
    var dateEl = document.createElement('span')
    dateEl.innerHTML = num
    newDay.className = 'cal__date'
    newDay.setAttribute("value", num);
    newDay.setAttribute("id", num);
    
    if (num === 1) {
      var offset = ((day - 1) * 14.28)
      if (offset > 0) {
        newDay.style.marginLeft = offset + '%'
      }
    }

    if (this.date.getTime() <= this.todaysDate.getTime() - 1) {
      newDay.classList.add('cal__date--disabled')
    } else {
+      newDay.classList.add('cal__date--active')
      newDay.setAttribute('data-calendar-status', 'active')
    }

    if (this.date.toString() === this.todaysDate.toString()) {
      newDay.classList.add('cal__date--today')

      var dt = new Date();

      var mes = dt.getMonth()+1;
      var dia = dt.getDate();
      var ano = dt.getFullYear();

      if (mes < 10) {
        mes = "0"+mes;
      }

      var xml = new XMLHttpRequest();
      xml.onreadystatechange = function(){
        if (xml.readyState === 4 && xml.status === 200) {
            document.getElementById("recebe_eventos").innerHTML = xml.responseText;
        }
      };
      xml.open("GET", "assets/js/vendor/busca_evento.php?d="+dia+"&m="+mes+"&a="+ano, true);
      xml.send();      
    }

    newDay.appendChild(dateEl)
    this.month.appendChild(newDay)
  },
  dateClicked: function () {
    var _this = this
    this.activeDates = document.querySelectorAll(
      '[data-calendar-status="active"]'
    )
    for (var i = 0; i < this.activeDates.length; i++) {
      this.activeDates[i].addEventListener('click', function (event) {
      this.dataset.calendarDate
        _this.removeActiveClass()
        this.classList.add('cal__date--selected')
        var dia = document.getElementsByClassName('cal__date--selected')[0].id;
        var mes_ano = document.querySelectorAll('[data-calendar-label="month"]')[0].innerHTML;
        var retorno = mes_ano.split(" ");
        var mes = retorno[0];
        var ano = retorno[1];

        if(mes=="Janeiro"){
          mes = "01";
        }else if(mes=="Fevereiro"){
          mes="02";
        }else if(mes=="Março"){
          mes="03";
        }else if(mes=="Abril"){
          mes="04";
        }else if(mes=="Maio"){
          mes="05";
        }else if(mes=="Junho"){
          mes="06";
        }else if(mes=="Julho"){
          mes="07";
        }else if(mes=="Agosto"){
          mes="08";
        }else if(mes=="Setembro"){
          mes="09";
        }else if(mes=="Outubro"){
          mes=10;
        }else if(mes=="Novembro"){
          mes=11;
        }else if(mes=="Dezembro"){
          mes=12;
        }
        var xml = new XMLHttpRequest();
        xml.onreadystatechange = function(){
          if (xml.readyState === 4 && xml.status === 200) {
              document.getElementById("recebe_eventos").innerHTML = xml.responseText;
          }
        };
        xml.open("GET", "assets/js/vendor/busca_evento.php?d="+dia+"&m="+mes+"&a="+ano, true);
        xml.send();
      })
    }
  },

  createMonth: function () {
    var currentMonth = this.date.getMonth()
    while (this.date.getMonth() === currentMonth) {
      this.createDay(this.date.getDate(), this.date.getDay(), this.date.getFullYear())
      this.date.setDate(this.date.getDate() + 1)
    }
    // while loop trips over and day is at 30/31, bring it back
    this.date.setDate(1)
    this.date.setMonth(this.date.getMonth() - 1)

    this.label.innerHTML = this.monthsAsString(this.date.getMonth()) + ' ' + this.date.getFullYear()
    this.dateClicked()
  },

  monthsAsString: function (monthIndex) {
    return [
      'Janeiro',
      'Fevereiro',
      'Março',
      'Abril',
      'Maio',
      'Junho',
      'Julho',
      'Agosto',
      'Setembro',
      'Outubro',
      'Novembro',
      'Dezembro'
    ][monthIndex]
  },

  clearCalendar: function () {
    vanillacalendar.month.innerHTML = ''
  },

  removeActiveClass: function () {
    for (var i = 0; i < this.activeDates.length; i++) {
      this.activeDates[i].classList.remove('cal__date--selected')
    }
  }
}
