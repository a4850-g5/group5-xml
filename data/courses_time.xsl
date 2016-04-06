<?xml version="1.0" encoding="UTF-8"?>

<!--
	Document   : courses_time.xsl
	Created on : April 4, 2016, 11:54 PM
	Author     : Kenneth
	Description:
		From the courses.xml facet, create the html time over days timetable.
-->

<xsl:stylesheet 
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	version="1.0">
	<xsl:output method="html"/>
	
	<!-- to help with getting the proper course from date and start time -->
	<xsl:key name="dayStart" match="booking" use="concat(day/@which, '+', period/@start)" />
	
	<!-- The Master Layout -->
	<xsl:template match="/">
		<html>
			<head>
				<title>Start Time centric view for courses.xml</title>
				<link rel="stylesheet" type="text/css" href="../assets/css/xml.css" />
			</head>
			<body>
				<h1>Start Time centric view for courses.xml</h1>
				<table>
					<xsl:call-template name="headings" />
					<tr>
						<th>Monday</th>
						<xsl:call-template name="row">
							<xsl:with-param name="weekday" select="'mon'" />
						</xsl:call-template>
						<th>Monday</th>
					</tr>
					<tr>
						<th>Tuesday</th>
						<xsl:call-template name="row">
							<xsl:with-param name="weekday" select="'tue'" />
						</xsl:call-template>
						<th>Tuesday</th>
					</tr>
					<tr>
						<th>Wednesday</th>
						<xsl:call-template name="row">
							<xsl:with-param name="weekday" select="'wed'" />
						</xsl:call-template>
						<th>Wednesday</th>
					</tr>
					<tr>
						<th>Thursday</th>
						<xsl:call-template name="row">
							<xsl:with-param name="weekday" select="'thur'" />
						</xsl:call-template>
						<th>Thursday</th>
					</tr>
					<tr>
						<th>Friday</th>
						<xsl:call-template name="row">
							<xsl:with-param name="weekday" select="'fri'" />
						</xsl:call-template>
						<th>Friday</th>
					</tr>
					<xsl:call-template name="headings" />
				</table>
			</body>
		</html>
	</xsl:template>
	
	<!-- Table Headings -->
	<xsl:template name="headings">
		<tr>
			<th></th>
			<th>08:30 - 09:20</th>
			<th>09:30 - 10:20</th>
			<th>10:30 - 11:20</th>
			<th>11:30 - 12:20</th>
			<th>12:30 - 13:20</th>
			<th>13:30 - 14:20</th>
			<th>14:30 - 15:20</th>
			<th>15:30 - 16:20</th>
			<th>16:30 - 17:20</th>
			<th></th>
		</tr>
	</xsl:template>
	
	<!-- One Row (Time based) -->
	<xsl:template name="row">
		<xsl:param name="weekday" />
		<!-- 08:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="startTime" select="'08:30'" />
			<xsl:with-param name="secondHourEnd" select="'10:20'" />
		</xsl:call-template>
		
		<!-- 09:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="previousHour" select="'08:30'" />
			<xsl:with-param name="startTime" select="'09:30'" />
			<xsl:with-param name="secondHourEnd" select="'11:20'" />
		</xsl:call-template>
		
		<!-- 10:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="previousHour" select="'09:30'" />
			<xsl:with-param name="startTime" select="'10:30'" />
			<xsl:with-param name="secondHourEnd" select="'12:20'" />
		</xsl:call-template>
		
		<!-- 11:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="previousHour" select="'10:30'" />
			<xsl:with-param name="startTime" select="'11:30'" />
			<xsl:with-param name="secondHourEnd" select="'13:20'" />
		</xsl:call-template>
		
		<!-- 12:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="previousHour" select="'11:30'" />
			<xsl:with-param name="startTime" select="'12:30'" />
			<xsl:with-param name="secondHourEnd" select="'14:20'" />
		</xsl:call-template>
		
		<!-- 13:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="previousHour" select="'12:30'" />
			<xsl:with-param name="startTime" select="'13:30'" />
			<xsl:with-param name="secondHourEnd" select="'15:20'" />
		</xsl:call-template>
		
		<!-- 14:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="previousHour" select="'13:30'" />
			<xsl:with-param name="startTime" select="'14:30'" />
			<xsl:with-param name="secondHourEnd" select="'16:20'" />
		</xsl:call-template>
		
		<!-- 15:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="previousHour" select="'14:30'" />
			<xsl:with-param name="startTime" select="'15:30'" />
			<xsl:with-param name="secondHourEnd" select="'17:20'" />
		</xsl:call-template>
		
		<!-- 16:30 -->
		<xsl:call-template name="bookingCheck">
			<xsl:with-param name="weekday" select="$weekday" />
			<xsl:with-param name="previousHour" select="'15:30'" />
			<xsl:with-param name="startTime" select="'16:30'" />
		</xsl:call-template>
	</xsl:template>

	<!-- Booking Check whether or not course exists for date/time -->
	<!-- also checks if booking is two hours long and formats table accordingly -->
	<xsl:template name="bookingCheck">
		<xsl:param name="weekday" />
		<xsl:param name="previousHour" />
		<xsl:param name="startTime" />
		<xsl:param name="secondHourEnd" />
		<xsl:choose>
			<xsl:when test="key('dayStart', concat($weekday, '+', $startTime))">
				<xsl:for-each select="key('dayStart', concat($weekday, '+', $startTime))">
					<xsl:choose>
						<xsl:when test="period[@end = $secondHourEnd]">
							<td colspan="2">
								<xsl:apply-templates select="." mode="single" />
							</td>
						</xsl:when>
						<xsl:otherwise>
							<td>
								<xsl:apply-templates select="." mode="single" />
							</td>
						</xsl:otherwise>
					</xsl:choose>
				</xsl:for-each>
			</xsl:when>
			<xsl:otherwise>
				<xsl:if test="not(key('dayStart', concat($weekday, '+', $previousHour)))">
					<td></td>
				</xsl:if>
			</xsl:otherwise>
		</xsl:choose>
	</xsl:template>
	
	<!-- Individual Cells -->
	<xsl:template match="course/booking" mode="single">
		<xsl:value-of select="../@courseCode" />&#160;
		<xsl:value-of select="courseType" />
		<br />
		<xsl:value-of select="period/@start" />&#160;-&#160;<xsl:value-of select="period/@end" />
		<br />
		<xsl:value-of select="room" />
		<br />
		<xsl:value-of select="instructor" />
	</xsl:template>

</xsl:stylesheet>
