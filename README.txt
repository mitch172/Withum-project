Author:     Evan Mitchell
Objective:  To develope a single website that HR can use to enter the details of a new hire and for those details to be displayed on a seperate webpage that IT can view.

Current Features:
- Front end page that can enter new hire information and submit data to SQL table newHires
- Front end page that can enter upgrade/rebuild information and submit data to SQL table upgrades
- Two SQL tables, newHires and upgrades, that organize entries of two types
- Two display pages, viewNewHires and viewUpgrades, which display all entries in their respective tables to IT
            - Both pages can display all entries in tables, an update button, and a delete button
            - The update button opens the singular entry in the table as a full page and allows users to change every value of the entry and push these changes to the table
            - The delete button pulls the entry in the table which shares an ID value with the delete button and deletes it from the table 
