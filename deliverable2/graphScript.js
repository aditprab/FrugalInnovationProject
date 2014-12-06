var width = 50;
var height;
var svgHeight = 400;
var svgWidth = 1000;
var x = 0;
var y;
var xIncr = width + 80; 
var htmlString = "<svg id=\"categoriesGraph\" width=\"" + svgWidth + "px\" height=\"" + svgHeight + "px\">";
var svgString;
var textString;
var textY = svgHeight - 50;

var drawGraph = function(categoryCount){
    var keys = Object.keys(categoryCount).sort();
    for(var i = 0; i < keys.length; i++)
    {
        height = categoryCount[keys[i]] * 10;
        svgString = "<text class=\"catLabel\" x = \"" + (x + (.3 * width)) + "\" y = \"" + (textY - height - 70) + "\">" + categoryCount[keys[i]] + "</text>";
        svgString += "<rect class=\"bar\" x = \"" + x + "\" y=\"" + (textY - height - 50) + "\" width=\"" + width + "\" height=\"" + height + "\"/>"; 
        if(key = keys[i].replace(" ", "<tspan x=\"" + x + "\" y = \"" + (textY + 20) + "\">"))
        {
            key += "</tspan>";
        }
        textString = "<text class=\"catLabel\" x = \"" + x + "\" y = \"" + textY +"\">" + key + "</text>";
        htmlString += svgString;
        htmlString += textString;
        x += xIncr;
    }
    $("#graph").append(htmlString);
};

var cirleHover = function(){
    $(this).attr('r', '6');
        if($(".tooltip").length)
            $(".tooltip").remove();
        var projName, top;
        var left = parseInt($(this).attr("cx")) + 20;
        switch($(this).attr('id')){
            case "fil":
                top = $(this).attr("cy") - 30;
                projName = "Frugal Innovation Lab";
            break;
            case "uganda":
                top = $(this).attr("cy") - 28;
                projName = "Energy Made In Uganda";
            break;
            case "nicaragua":
                top = $(this).attr("cy") - 35;
                projName = "Seed Bank Tracking in Nicaragua";
            break;
            case "kolkata":
                top = $(this).attr("cy") - 30;
                projName = "Anudip and iMerit";
            break;
            case "mexico":
                top = $(this).attr("cy") - 18;
                projName = "salaUno CATRA";
            break;
            case "southAfrica":
                top = $(this).attr("cy") - 20;
                projName = "IhaveIneed";
            break;
            case "nigeria":
                top = $(this).attr("cy") - 25;
                projName = "Project Omoverhi";
            break;
            case "kenya": 
                top = $(this).attr("cy") - 53;
                projName = "NetHope and SCU Mobile Health Interoperability Research";
            break;
            case "ghana":
                top = $(this).attr("cy") - 35;
                projName = "Ghana Footbridge Project";
            break;
        }
        $("#svg").append("<div style=\"border: 1px solid black; position:absolute; left: "+ left +"px; top: "+ top +"px\" class=\"tooltip\">" + projName + "</div>");
    };
$(document).ready(function(){
    var categoryCount = {};
    categoryCount["Renewable Energy"] = $("#RenewableEnergy .project").length;
    categoryCount["Clean Water"] = $("#CleanWater .project").length;
    categoryCount["Mobile For Humanity"] = $("#MobileForHumanity .project").length;
    categoryCount["Community Projects"] = $("#CommunityProjects .project").length;
    categoryCount["Livelihood Development"] = $("#LivelihoodDevelopment .project").length;
    categoryCount["Other Interdisciplinary"] = $("#OtherInterdisciplinary .project").length;
    categoryCount["Public Health"] = $("#PublicHealth .project").length;
    categoryCount["Sustainable Building"] = $("#SustainableBuilding .project").length;

    $("circle").hover(cirleHover, function(){    /*handler for no longer hovering*/
        $(this).attr('r', '5');
        $(".tooltip").remove();
    });
    
    drawGraph(categoryCount);
});