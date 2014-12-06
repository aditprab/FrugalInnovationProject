/*To use nav, all you have to do is add a div with id navbar to the top of your page*/
var links = {
            Home:"http://students.engr.scu.edu/~nlam/deliverable2",
            Projects:"http://students.engr.scu.edu/~nlam/deliverable2/projects.xml",
            Team:"http://students.engr.scu.edu/~aprabhak/FrugalInnovationProject/people/team.html",
            Donations:"http://students.engr.scu.edu/~aprabhak/FrugalInnovationProject/deliverable2/donations.html",
            Quiz:"http://students.engr.scu.edu/~nlam/deliverable2/quiz.html",
            Blog:"http://students.engr.scu.edu/~nlam/deliverable2/blog.html",
            "Project Proposal":"http://students.engr.scu.edu/~nlam/deliverable2/proposal.html"
        };
var keys = Object.keys(links);
var appendHTML = "";
for(var i = 0; i < keys.length; i++)
{
    appendHTML += '<a href="' + links[keys[i]] + '"><div class="navButton">' + keys[i] + '</div></a>';
}
$(document).ready(function(){
    $("#navBar").append(appendHTML);
});
