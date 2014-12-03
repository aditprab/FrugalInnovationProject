//Global declarations:
var subjectMatterArray = ["Frugal Innovation", "Sports", "Geography"];
var currentQuizNumber;
var numberOfQuizzesDone = 0;
var quizIndex = 0;

var correct = 0;
var incorrect = 0;

var timeLimit = 85/*seconds*/;
var time = timeLimit;

var timer = function(){
	if(time <= 10 && time > 0)
	{
		var min = Math.floor((time / 60));
		var secTens = (Math.floor((time % 60) / 10)).toString();
		var sec = (Math.floor((time % 60) % 10)).toString();
		$("#timer").html('<h2>' + min + ':' + secTens + sec + '</h2>')
				  .animate({fontSize:'2em'})
				  .animate({fontSize:'1em'});
		time--;
		ctimer = setTimeout(timer, 1000);
	}
	else if (time > 0){
		var min = Math.floor((time / 60));
		var secTens = (Math.floor((time % 60) / 10)).toString();
		var sec = (Math.floor((time % 60) % 10)).toString();
		$("#timer").html('<h2>' + min + ':' + secTens + sec + '</h2>');
		time--;
		ctimer = setTimeout(timer, 1000); //calls the first parameter after second parameter amount of time has elapsed. 
	}
	else //if the time has run out
	{
		time = timeLimit;
		stop();
	}
};

var changeLogo = function(){
	var imgFileName;
	var subject = subjectMatterArray[currentQuizNumber];
	if(subject == "Frugal Innovation")
	{
		return;
	}
	else if(subject == "Sports")
	{
		imgFileName = "basketball.png";
	}
	else
	{
		imgFileName = "globe.png";
	}
	$("#logo").attr("src", imgFileName);
	$("#logo").animate({fontSize:'2em'});
	$("#logo").animate({fontSize:'1em'});
};
		

var date = function(){
	var d = new Date();
	$("#date").empty().html("<h4>" + d.toDateString() +"</h4>");
};

function randomSubjectMatter(){
	//Generate random number 0, 1, or 2. Check global subject array and pull that one.
	if(numberOfQuizzesDone == subjectMatterArray.length)
	{
		$("#quiz").empty();
		$("#quiz").append('<h1 id="thankYou" class="center"> We are all out of quizzes for you! Refresh your page to do them again, or come back later! </h1>');
		return null;
	}

	var i;
	for(i = 0; i < 3; i++)
	{
		var x = Math.floor(Math.random() * (3)); //3 is max, excluded. 
		if(x != currentQuizNumber)
		{
			//We never want to give the same quiz twice in one sitting.
			currentQuizNumber = x;
			numberOfQuizzesDone++;
			return subjectMatterArray[x];
		}
		
	}
};

function shuffle(array){
	//use function to shuffle array of questions and therefore you can just iterate through them as usual while randomizing choices.
	var shuffledArray = [];
	var length = array.length;
	while(shuffledArray.length < length)
	{
		var random = Math.floor((Math.random() * array.length));
		shuffledArray.push(array.splice(random, 1)[0]);		//array.splice returns an array
	}
	return shuffledArray;
};	


function initializeQuestions(questionsName){
	//Takes the subject name as a parameter.
	//Pull the questions file assosciated with that subject name, put all the objects in an array, shuffle. 
	//return array. 
	var objectArray; 

	if(questionsName == "Frugal Innovation"){
		var length = frugalInnovationQuiz.length; //has global scope
		objectArray = frugalInnovationQuiz;
	}
	else if(questionsName == "Sports"){
		var length = sports.length;
		objectArray = sports;

	}
	else{
		//Geo case
		var length = geography.length;
		objectArray = geography;
	}

	objectArray = shuffle(objectArray); //Shuffles frugal innovation lab question objects. 

	return objectArray;
}

function buildQuestionAndPlaceInDocument(questionObject){
	var question = questionObject.question;
	$("#quiz").append("<h3>" + question +"</h3>");
}


var stop = function(){
	time = 0;
	$("#quizChoices").empty();
	if(correct == 0){
		$("#quizQuestion").empty().append('<h3>You got ' + correct + ' correct! Try again. You can do it!</h3>');
	}
	else{
	$("#quizQuestion").empty().append('<h3>Congratulations! You got ' + correct + ' correct!</h3>');
	}	
	$("#quizQuestion").append('<h4 id="thanks" class="center"> Thanks for taking the quiz! </h4>');
	//make the # correct and # incorrect larger
}

function createRadio(questionObject){
	var choiceStringArray = questionObject.choices;
	$("#quizChoices").empty();
	for(var i=0; i < choiceStringArray.length; i++)
	{
		var choiceString = choiceStringArray[i];
		var radioBtn = $('<input id="radio'+i+'" type="radio" name="rbtnCount">' + choiceString + '</input><br/>');
		radioBtn.val(choiceString);
		radioBtn.appendTo('#quizChoices');
	}
}

function displayScores(){
	$("#correct").empty().append("<h2>" + correct + "</h2>");
	$("#incorrect").empty().append("<h2>" + incorrect + "</h2>");
}

function gradeQuiz(array){
	var radioID;
	if(($("#radio0").is(":checked")))
		radioID = "#radio0";
	else if(($("#radio1").is(":checked")))
		radioID = "#radio1";
	else if(($("#radio2").is(":checked")))
		radioID = "#radio2";
	else if(($("#radio3").is(":checked")))
	    radioID = "#radio3";
	else if(($("#radio4").is(":checked")))
		radioID = "#radio4";

	if($(radioID).val() == array[quizIndex].correctChoice)
		correct++;
	else
		incorrect++;
	displayScores();
}

$(document).ready(function(){
	//choose a random subject matter to quiz
	//display subject in the title section
	date();
	$("#beginQuiz").click(function(){
	displayScores();
	timer();		
	$("#buttons").append('<a href="#"><div id="stop" class="button">stop</div></a>');
	$("#stop").click(function(){
		//register. 
		//Stop could mean stop this quiz particularly, or stop in general. 
		stop();
		return false;
	});

	$("#buttons").append('<a href="#"><div id ="next" class="button">next</div></a>');
	var subjectMatter = randomSubjectMatter();
	var array = initializeQuestions(subjectMatter);

	changeLogo();
	$("#quizName").animate({fontSize:'2em'});
	$("#beginQuiz").remove();
	$("#quizName").empty().append("<h3>" + subjectMatter + "</h3>");
	$("#quizQuestion").append("<h4>" + array[quizIndex].question + "</h4>");
	createRadio(array[quizIndex]);
	$("#next").click(function(){
		if(time == 0)
			return false;
		if(!($("#radio0").is(":checked") || $("#radio1").is(":checked") || $("#radio2").is(":checked") || $("#radio3").is(":checked") || $("#radio4").is(":checked")))
		{
				alert("You must select an answer!");
				return false;
		}
		if(quizIndex == array.length - 1)
		{
			gradeQuiz(array);
			stop();
			return;
		}
		gradeQuiz(array);
		quizIndex++;
		$("#quizQuestion").empty().append(array[quizIndex].question);
		$("#quizChoices").css("padding-top", "1em");
		createRadio(array[quizIndex]);
		//condition for getting to the end of quiz
		
	});

	
	return false;
});
});