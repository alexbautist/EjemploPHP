
$(function () {
    $(".iframe").fancybox({
        transitionIn: "elastic",
        speedIn: 1000
    });
    $("a#inline").fancybox({
        'hideOnContentClick': true
    });

    afficher();
    

    $(document).on("click", '.sup', supprimer);
    $(document).on("click", '.mod', modifier0);
    $(document).on("submit", '#formAjouter', ajouter);
    $(document).on("submit", '#formModifier', modifier);

});

function afficher(){
    $.getJSON("../Requetes.php", function (reponse) {
        $.each(reponse, function (i, value) {
            $(".table").append("<tr id=" + value.id + " class='task' ><td scope='col'>" + value.id + "</td><td class='tdDate' scope='col'>" + value.date + "</td>\n\
            <td class='tdName' scope='col'>" + value.name + "</td><td>fsff</td><td class='tdCharge' scope='col'>ALex</td><td><a data-fancybox data-src='#ajouterPersonne' href='javascript:;'><span><i class='fas fa-user-edit'></i></span></a><a data-fancybox data-src='#modifierData' href='javascript:;'><button class='mod'>Modifier</button></a><button id='a' class='sup' >Supprimer</button></td></tr>");
        });
    });
}
function ajouter(e) {
    e.preventDefault();
    var date = $("#date").val();
    var name = $("#name").val();

    $.ajax({
        data: /*{"action": "add", "date": date, "name": name}*/ $("#formAjouter").serialize(),
        url: '../Requetes.php',
        type: 'GET',
        success: function () {
            window.location.href="index.php";
        },
        error: function (err) {
            console.log(err);
        }
    });
}

function modifier0() {
    var name= $(this).parent().parent().siblings(".tdName").text();
    var date= $(this).parentsUntil(".task").siblings(".tdDate").text();
    var id = $(this).parentsUntil(".task").parent().attr("id");
    $("#nameMod").val(name);
    $("#dateMod").val(date);
    $("#idMod").val(id);
   
}

function modifier(e){
    e.preventDefault();
    $.ajax({
        data: $("#formModifier").serialize(),
        url: '../Requetes.php',
        type: 'GET',
        success: function (reponse) {
            location.href="index.php";
        },
        error: function () {
        }
    });
}

function supprimer() {
    var id = $(this).parentsUntil(".task").parent().attr("id");
    $.ajax({
        data: {"action": "remove", "id": id},
        url: '../Requetes.php',
        type: 'GET',
        success: function (reponse) {
            location.href="index.php";
        },
        error: function () {
        }
    });
}
