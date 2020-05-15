<form action="/">
    <label>Num1
        <input type="number" name="num1">
    </label>
    <select name="operation" id="operation">
        <option value="div">/ деление</option>
        <option value="multi">* умножение</option>
        <option value="sub">- вычитание</option>
        <option value="sum">+ сложение</option>
    </select>
    <label>Num2
        <input type="number" name="num2">
    </label>
    <input type="submit" value="calc">
</form>
<br/>
<form action="/">
    <label>Num1
        <input type="number" name="num1">
    </label>
    <button value="div" name="operation">/</button>
    <button value="multi" name="operation">*</button>
    <button value="sub" name="operation">-</button>
    <button value="sum" name="operation">+</button>
    <label>Num2
        <input type="number" name="num2">
    </label>

</form>
<h3>Результат: <?=$result?></h3>