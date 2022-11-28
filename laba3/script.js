var count_rows = 0;

document.getElementById('make').onclick = function() {
    open_button();
    if (is_exist_table()){
        count_rows++;
        var tb = document.querySelector('#tb');
        var table = document.createElement('table');
        tb.appendChild(table);
        var tr = document.createElement('tr');
	    table.appendChild(tr);
	    for (var j = 0; j < 3; j++) {
            if(j==0){
                var par = document.createElement('p')
                par.textContent = count_rows;
			    var td = document.createElement('td');
                td.appendChild(par);
		        tr.appendChild(td);
            }else{
                var par = document.createElement('p')
                par.textContent =  get_Random_digital(1, 10000);
                var td = document.createElement('td');  
                td.appendChild(par); 
                tr.appendChild(td);
            }
        }
	}
}

function open_button(){
    var dis = document.querySelector('#add');
    var del = document.querySelector('#delete');
    var find = document.querySelector('#find');
    dis.disabled = false;
    del.disabled = false;
    find.disabled = false;
}

function close_button(){
    var dis = document.querySelector('#add');
    var del = document.querySelector('#delete');
    var find = document.querySelector('#find');
    dis.disabled = true;
    del.disabled = true;
    find.disabled = true;  
}

function is_exist_table(){
    var exist = document.querySelector('table');
    if (exist != null ){
        alert("Таблица уже существует!")
        return false;
    }else{
        return true;
    }
}

document.getElementById('add').onclick = function() {
    count_rows++;
    var table = document.querySelector('table');
    var tr = document.createElement('tr');
    table.appendChild(tr);
    for (var j = 0; j < 3; j++) {
        if(j==0){
            var par = document.createElement('p')
            par.textContent = count_rows;
            var td = document.createElement('td');
            td.appendChild(par);
            tr.appendChild(td);
        }else{
            var par = document.createElement('p')
            par.textContent =  get_Random_digital(1, 10000);
            var td = document.createElement('td'); 
            td.appendChild(par); 
            tr.appendChild(td);
        }
    }    
}

document.getElementById('delete').onclick = function() {
    var number_of_row = document.getElementById('find').value;
    if (is_exist_row() && is_number()){
        document.getElementsByTagName( 'tr' )[number_of_row-1].remove();
        count_rows--;
        if(count_rows==0){
        document.querySelector( 'table' ).remove();
        close_button();
        }
        for(var i =number_of_row; i<=count_rows;i++){
            var par =document.getElementsByTagName('p')[(3*(i-1))];
            par.innerText = i;
        }
    }
}

function is_exist_row(){
    var number_of_row = document.getElementById('find').value;
    if ((number_of_row>count_rows)||(number_of_row<=0)){
        alert("Строки с номером "+number_of_row+" не существует!" +'\n'+"Введите число от 1 до "+ count_rows);
        return false;
    }else{
        return true;
    }
}
function is_number(){
    var number_of_row = document.getElementById('find').value;
    if((isNaN(number_of_row))){
        alert("Это не число :(" +'\n'+"Введите число от 1 до "+ count_rows);
        return false;
    }else{
        return true;
    }
}
function get_Random_digital(min, max) {
    return Math.ceil(Math.random() * (max - min) + min);
  }

