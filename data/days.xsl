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
					<xsl:call-template name="headings" />
					<xsl:call-template name="daysCol" />
				</table>
			</body>
		</html>
	</xsl:template>

	<xsl:template name="headings">
		<thead>
			<tr>
				<th></th>
				<th>08:30</th>
				<th>09:30</th>
				<th>10:30</th>
				<th>11:30</th>
				<th>12:30</th>
				<th>13:30</th>
				<th>14:30</th>
				<th>15:30</th>
				<th>16:30</th>
			</tr>
		</thead>
	</xsl:template>
	
	<xsl:template name="daysCol">
		<xsl:for-each select="days/day">
			<tr>
				<th>
					<xsl:value-of select="./@which"/>
				</th>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='08:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='09:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='10:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='11:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='12:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='13:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='14:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='15:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
				<td>
					<xsl:for-each select="./booking">
						<xsl:if test="./period/@start='16:30'">
							<xsl:apply-templates select="." />
						</xsl:if>
					</xsl:for-each>
				</td>
			</tr>

		</xsl:for-each>
	</xsl:template>
	
	<xsl:template match="period">
		<xsl:value-of select="./courseCode"/>
		<xsl:value-of select="./courseType"/>
		<xsl:value-of select="./room"/>
		<xsl:value-of select="./instructor"/>
	</xsl:template>

</xsl:stylesheet>
