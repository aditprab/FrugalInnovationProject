<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="categories">
    <html>
    	<head>
            <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'/>
            <link href='nav.css' rel='stylesheet' type='text/css'/>
    		<style>
                html, body
                {
                    margin:0;
                    font-family:Lato, sans-serif;
                    font-weight:300;
                    padding-bottom:5%;
                }
                #content
                {
                    width:68%;
                    margin:0 auto;
                }
                .category h4, .category h2
                {
                    margin-bottom:0;
                }
                .project
                {
                    width:100%;
                    display:inline-block;
                }
                #projects
                {
                    -moz-column-count: 2;
                    -webkit-column-count: 2;
                    column-count: 2;
                    /*-webkit-column-break-inside:avoid;
                    -moz-column-break-inside:avoid;
                    column-break-inside:avoid;*/
                }
                .project h3
                {
                    color:rgb(150, 40, 27);
                }
                rect
                {
                    fill: rgb(150, 40, 27);
                }
                #graph 
                {
                    width:960px;
                    margin:0 auto;
                    text-align:center;
                }
                #map, #svg, #mapContainer
                {
                    height:480px;
                }
                #mapContainer, #svg svg
                {
                    width:960px;
                }
                #map, #svg
                {
                    position:absolute;
                    left:0;
                    top:60px;  
                }
                #map img
                {
                    height:100%;
                }
                #svg svg
                {
                    height:100%;    /*height inherited from parent element is 480px*/
                }
                circle
                {
                    fill:rgb(150, 40, 27);
                }
                .tooltip
                {
                    text-align:center;
                    color:white;
                    width: 100px;                  
                    padding: 5px; 
                    font:14px 'Lato', sans-serif;
                    background-color:rgba(0, 0, 0, .8);         
                    border: 0px;      
                    border-radius: 2px;           
                    pointer-events: none;  
                }
                .tooltip:after {
                    box-sizing: border-box;
                    display: inline;
                    font-size: 10px;
                    width: 100%;
                    line-height: 1;
                    color: rgba(0, 0, 0, 0.8);
                    content: "\25C0";
                    position: absolute;
                    text-align: center;
                    margin: -3px 0 0 0;
                    top: 50%;
                    left: -59px;
                }
                #mapContainer
                {
                    margin: 0 auto;
                    position:relative;
                    margin-bottom: 10%;
                }
                #mapContainer h2
                {
                    text-align:center;
                }
    		</style>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script src="graphScript.js"></script>
            <script src="nav.js"></script>
    	</head>
        <body>
            <div id="navBar">
            </div>
            <div id="content">
                <div id="mapContainer">
                    <h2>Frugal Innovation Across the Globe</h2>
                    <div id="map">
                        <img src="world.png"/>
                    </div>
                    <div id="svg">
                        <svg>
                            <circle id="fil" cx="128" cy="185" r="5">FIL</circle> 
                            <circle id="uganda" cx="546" cy="288" r="5"></circle>
                            <circle id="nicaragua" cx="226" cy="256" r="5">Nicaragua</circle>
                            <circle id="kolkata" cx="693" cy="230" r="5">Kolkata</circle>
                            <circle id="mexico" cx="180" cy="230" r="5">Mexico</circle>
                            <circle id="southAfrica" cx="525" cy="373" r="5">South Africa</circle>
                            <circle id="nigeria" cx="478" cy="268" r="5">Nigeria</circle>
                            <circle id="kenya" cx="560" cy="290" r="5">Kenya</circle>
                            <circle id="ghana" cx="454" cy="270" r="5">Ghana</circle>
                        </svg>
                    </div>
                </div>
                <div id="graph">
                    <h2>Projects By Category</h2>
                </div>
                <div id="projects">
                    <xsl:for-each select="category">
                        <xsl:variable name="cat" select="@name"/>
                        <div id="{translate($cat,' ','')}" class="category">
                        	<h2><xsl:value-of select="@name"/></h2>
                        	<xsl:for-each select="project">
                                <div class="project">
                            		<h3><xsl:value-of select="@name"/></h3>
                                    <xsl:if test="count(description) &gt; 0">
                                        <h4>Description</h4>
                                		<xsl:for-each select="description">
                                			<p><xsl:value-of select="text()"/></p>
                                		</xsl:for-each>
                                    </xsl:if>
                                    <xsl:if test="count(student) &gt; 0">
                                        <h4>Students</h4>
                                		<xsl:for-each select="student">
                                			<xsl:value-of select="text()"/><br/>
                                		</xsl:for-each>
                                    </xsl:if>
                                    <xsl:if test="count(advisor) &gt; 0">
                                        <h4>Advisors</h4>
                                		<xsl:for-each select="advisor">
                                			<xsl:value-of select="text()"/><br/>
                                		</xsl:for-each>
                                    </xsl:if>
                                    <xsl:if test="count(partner) &gt; 0">
                                        <h4>Partners</h4>
                                		<xsl:for-each select="partner">
                                			<xsl:value-of select="text()"/><br/>
                                		</xsl:for-each>
                                    </xsl:if>
                                </div>
                        	</xsl:for-each>
                        </div>
                    </xsl:for-each>
                </div>
            </div>
        </body>
    </html>
</xsl:template>
</xsl:stylesheet>