
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TODO</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="prefetch stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"/>

    <link rel="stylesheet prefetch" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700"/>
    <link rel="stylesheet prefetch" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css"/>

    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<header>
    <a href="#default" class="logo">PlanIn</a>
    <div class="header-right">
        <form action=""></form>
        <a >Sign in</a>
        <a class="active" href="#contact">Sign up</a>

    </div>
</header>

<div class="container">
    <div class="add" id="add" onclick="newTask()">Add new</div>
    <div class="title">
        <h1>Photos to do</h1>
    </div>

    <div class="new-task" id="new_task">
        <a class="add-new" href="#" id="add_task" onclick="createNewTask()">
            <i class="fa fa-plus add-new-idea" onclick="addNewIdea();"></i>
        </a>
        <input id="photo_idea_text" placeholder="New task">
    </div>
    
    <ul class="todo-ul">

        <?php
            $servername = "mysql.zzz.com.ua";
            $username = "PlanInBase";
            $password = "DeadLine77";
            $dbname = "xalumok1";
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM tasks WHERE user_id='234'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $vall = '`' . $row["photo_idea"] . '`';
                    echo     '<li class="row">';
                    echo               '<a class="remove" href="#" >';
                    echo                   '<i class="fa fa-trash-o" onclick="removeIdea(' . $vall . ');"></i>';
                    echo               '</a>';
                    echo                $row["photo_idea"];
                    echo              '</li>';
                }
            }
            $conn->close();

        ?>
    </ul>
</div>


<script>
    startinginitializeOfOnClickFunctionsForRemoveAndCompleted();
    var newTaskForm = document.querySelector(".new-task");
    var newTaskText = document.querySelector("#photo_idea_text");
    var ulTasks = document.querySelector(".todo-ul");
    var sheetLi = ulTasks.children[0].cloneNode(true);

    //    var tasks = [ {text:"Go to the bank", made:false},
    //                  {text:"Buy food", made:false},
    //                  {text:"Clean the house", made:false},
    //                  {text:"Make dinner", made:false},
    //                  {text:"Pick up the kids", made:false}
    //                 ];

    function startinginitializeOfOnClickFunctionsForRemoveAndCompleted() {
        let allTasks = document.querySelectorAll(".row");
        for (let i = 0; i < allTasks.length; i++) {
            initializeOfOnClickFunctionsForRemoveAndCompleted(allTasks[i]);
        }
    }

    function initializeOfOnClickFunctionsForRemoveAndCompleted(liElement) {


        (liElement.children[0]).onclick = function () {  //remove
            liElement.parentNode.removeChild(liElement);
        };

    }

    function createNewLi(text) {
        let newLi = document.createElement("li");
        newLi.classList.add("row");

        let removeA = document.createElement("a");
        removeA.classList.add("remove");
        let removeI = document.createElement("i");
        removeI.classList.add("fa");
        removeI.classList.add("fa-trash-o");
        removeA.appendChild(removeI);


        let taskText = document.createTextNode(text);

        newLi.appendChild(removeA);
        newLi.appendChild(completedA);
        newLi.appendChild(taskText);

        return newLi;
    }

    function addNewIdea()
    {
        window.location.href = 'addNewIdea.php?idea=' + newTaskText.value + '&user_id='+'234';
    }

    function newTask() {
        newTaskForm.style.display = "block";
    }

    function createNewTask() {
        if (ulTasks === undefined)
            ulTasks.appendChild(createNewLi(newTaskText.value));
        else
            ulTasks.insertBefore(createNewLi(newTaskText.value), ulTasks.firstChild);
        initializeOfOnClickFunctionsForRemoveAndCompleted(ulTasks.firstChild);
        newTaskText.value = "";
        newTaskForm.style.display = "none";
    }
    
    function removeIdea(e) {
        console.log(e.substring(0, e.length));
        window.location.href = 'removeIdea.php?idea=' + e.substring(0, e.length) + '&user_id='+'234';
    }
    

</script>

<script src="https://apis.google.com/js/platform.js" async defer></script>

</body>
</html>

