<?xml version="1.0" encoding="UTF-8"?>

<!--
	Document   : timetable_2.xsl
	Created on : March 31, 2016, 1:29 PM
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
				<title>timetable_2.xsl</title>
			</head>
			<body>
				<h1>TimeTable</h1>
				<table>
					<xsl:call-template name="headings"/>
					<xsl:apply-templates select="/timeslots/period"/>
					<xsl:for-each select="timeslots/period"/>
<!--					<xsl:apply-templates select="booking/day/@which"/>
					
					<sort select="."/>
					<xsl:if test=".!=preceding-sibling"/>
					<xsl:variable name="d" select='.'/>
					<xsl:apply-templates select="booking/day/@which"/>-->
					
				</table>
			</body>
		</html>
	</xsl:template>
	
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

	<!-- handle the time -->
	<xsl:template match="period">
		<tr>
			<td>
				<xsl:value-of select="./@start"/>
				<br/>
				<xsl:value-of select="./@end"/>
			</td>
			<xsl:for-each select="timeslots">
				<xsl:apply-templates select="."/>
			</xsl:for-each>
		</tr>
	</xsl:template>
	
<!--	 handle a day 
	<xsl:template match="booking">
		<tr>
			<td>
				<xsl:apply-templates select="day[@which='mon']"/>
			</td>
			<td>
				<xsl:apply-templates select="day[@which='thurs']"/>
			</td>
			<td>
				<xsl:apply-templates select="day[@which='fri']"/>
			</td>
		</tr>
	</xsl:template>
	-->

	
	<!-- handle a period -->
	<xsl:template match="booking">
		<td>
			<xsl:value-of select="day/@which"/>
			<br/>
			<xsl:value-of select="courseCode"/>
			<br/>
			<xsl:value-of select="courseType"/>
			<br/>
			<xsl:value-of select="room"/>
			<br/>
			<xsl:value-of select="instructor"/>
		</td>
	</xsl:template>


</xsl:stylesheet>
