<form action="/" name="calc">
    <input type="number" name="num1">
    <select name="operation" id="operation">
        <option value="div">/ деление</option>
        <option value="multi">* умножение</option>
        <option value="sub">- вычитание</option>
        <option value="sum">+ сложение</option>
    </select>
    <input type="number" name="num2">
    <input type="submit" value="calc">
</form>
<h3>Результат: <?=$result?></h3>