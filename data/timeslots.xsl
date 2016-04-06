<?xml version="1.0" encoding="UTF-8"?>

<!--
	Document   : timetable_2_2.xsl
	Created on : April 5, 2016, 2:20 PM
	Author     : jotilalli
	Description:
		Purpose of transformation follows.
-->

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:output method="html"/>

	<!-- TODO customize transformation rules 
		 syntax recommendation http://www.w3.org/TR/xslt 
	-->
	<xsl:template match="/">
		<html>
			<head>
				<title>timetable_2_2.xsl</title>
			</head>
			<body>
				<h1>Timeslots</h1>
				<table border="1">
					<xsl:call-template name="headings"/>
					<xsl:apply-templates select="timeslots/period"/>
				</table>
			</body>
		</html>
	</xsl:template>
	
		<!--Day's header-->	
		<xsl:template name="headings">
		<tr>
			<th>Time</th>
			<th>Monday</th>
			<th>Tuesday</th>
			<th>Wednesday</th>
			<th>Thursday</th>
			<th>Friday</th>
		</tr>
	</xsl:template>
	<xsl:template match="period">
		<tr>
			
			<!--Column to call the start & end time -->
			<td>
				<xsl:value-of select="./@start"/>
				<br/>
				<br/>
				<xsl:value-of select="./@end"/>
			</td>
			
			<!--Column to call Monday courses in the timeslot-->
			<td>
				<xsl:for-each select="booking">
					<xsl:if test="day/@which='mon'">
						<xsl:value-of select="./@which"/>
						<br/>
						<xsl:value-of select="./courseCode"/>
						<br/>
						<xsl:value-of select="./courseType"/>
						<br/>
						<xsl:value-of select="./room"/>
						<br/>
						<xsl:value-of select="./instructor"/>
					</xsl:if>
				</xsl:for-each>
			</td>

			<!--Column to call Tuesday courses in the timeslot-->			
			<td>
				<xsl:for-each select="booking">
					<xsl:if test="day/@which='tues'">
						<xsl:value-of select="./@which"/>
						<br/>
						<xsl:value-of select="./courseCode"/>
						<br/>
						<xsl:value-of select="./courseType"/>
						<br/>
						<xsl:value-of select="./room"/>
						<br/>
						<xsl:value-of select="./instructor"/>
					</xsl:if>
				</xsl:for-each>
			</td>
			

			<!--Column to call Wednesday courses in the timeslot-->			
			<td>
				<xsl:for-each select="booking">
					<xsl:if test="day/@which='wed'">
						<xsl:value-of select="./@which"/>
						<br/>
						<xsl:value-of select="./courseCode"/>
						<br/>
						<xsl:value-of select="./courseType"/>
						<br/>
						<xsl:value-of select="./room"/>
						<br/>
						<xsl:value-of select="./instructor"/>
					</xsl:if>
				</xsl:for-each>
			</td>
			

			<!--Column to call Thursday courses in the timeslot-->
			<td>
				<xsl:for-each select="booking">
					<xsl:if test="day/@which='thur'">
						<xsl:value-of select="./@which"/>
						<br/>
						<xsl:value-of select="./courseCode"/>
						<br/>
						<xsl:value-of select="./courseType"/>
						<br/>
						<xsl:value-of select="./room"/>
						<br/>
						<xsl:value-of select="./instructor"/>
					</xsl:if>
				</xsl:for-each>
			</td>

			<!--Column to call Friday courses in the timeslot-->			
			<td>
				<xsl:for-each select="booking">
					<xsl:if test="day/@which='fri'">
						<xsl:value-of select="./@which"/>
						<br/>
						<xsl:value-of select="./courseCode"/>
						<br/>
						<xsl:value-of select="./courseType"/>
						<br/>
						<xsl:value-of select="./room"/>
						<br/>
						<xsl:value-of select="./instructor"/>
					</xsl:if>
				</xsl:for-each>
			</td>
		</tr>
	</xsl:template>
</xsl:stylesheet>