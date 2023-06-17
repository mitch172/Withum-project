Author:     Evan Mitchell
Objective:  To develope a single website that HR can use to enter the details of a new hire and for those details
            to be displayed on a seperate webpage that IT can view.

Current Features:
    - Front end page that can enter new hire information and submit data to SQL table newHires
    - Front end page that can enter upgrade/rebuild information and submit data to SQL table upgrades
    - Two SQL tables, newHires and upgrades, that organize entries
    - Two display pages, viewNewHires and viewUpgrades, which display all entries in their respective tables to IT
        - Both pages can take inputs to change current status of build, who is building the machine, etc. and update their
        entries in the SQL table