<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
	<xsl:output method="html"/>
	<xsl:template match="/">
		<html>
			<head>
				<title>Day centric timetable</title>
			</head>
			<body>
				<h2>Day centric timetable</h2>
				<table>
					<xsl:call-template name="times" />
					<xsl:call-template name="days" />
				</table>
			</body>
		</html>
	</xsl:template>

	<xsl:template name="times">
		<xsl:for-each select="days/day/booking/period/@start">
			<xsl:if test='.!=precedence-sibling'>
				<tr>
					<th>
						<xsl:value-of select="."/>
					</th>
				</tr>
			</xsl:if>
		</xsl:for-each>
	</xsl:template>
	
	<xsl:template name="days">
		<xsl:for-each select="days/day/@which">
			<tr>
				<td>
					<xsl:value-of select="."/>
				</td>
				<xsl:for-each select="day">
					<xsl:sort select="."/>
				</xsl:for-each>
			</tr>
		</xsl:for-each>
	</xsl:template>

</xsl:stylesheet>
