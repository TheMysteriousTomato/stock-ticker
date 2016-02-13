# Changelog
All notable changes to this project will be documented in this file.

## 1.1.3 Beta - 2016-02-13
### Removed:
- Content Delivery Networks ( files served locally )

## 1.1.2 Beta - 2016-02-13
### Removed:
- All Transactions Model calls in the Player Controller

## 1.1.1 Beta - 2016-02-13
### Cleaned:
- Stock Controller
- Stocks Model

## 1.1.0 Beta - 2016-02-11
### Added:
- Moved transaction table to right-panel

## 1.0.11 - 2016-02-11
### Added:
- Load most active player if no player is logged in
- Reduced code in Player Controller and Transaction Model
### Fixed:
- Fix Players/index - no playername

## 1.0.10 - 2016-02-11
### Added:
- Change navbar with appropriate names
- Transactions for stocks
- Style for transactions
### Fixed:
- Homepage: fix links to stock history pages
- Fix login and logoff redirect
- Fix json header conflict
- Fix .htaccess

## 1.0.9 - 2016-02-11
### Added:
- Now displays currently logged in user

## 1.0.8 - 2016-02-11
### Added:
- Added login and logoff functionality

## 1.0.7 - 2016-02-12
### Added:
- Created a view and controller for the players
- Added a drop down menu to list the players
- Populated table with transaction data
- Populated a table with holdings data for players

## 1.0.6 - 2016-02-11
### Added:
- Grab equity for each appropriate player
- Links for each player's portfolio page
- Links for each stock's history page
- Homepage with stocks and players info

## 1.0.5 - 2016-02-11
### Added:
- Stock History

## 1.0.4 - 2016-02-11
### Added:
- Added stock/display
- Added dropdown list in stock index
- Altered Movements and Transactions models
- Altered autoload
    - autoloaded movements and transactions models
    - url helper

## 1.0.3 - 2016-02-10
### Added:
- Added stockcontroller
- Added stock model
- Added stock index view

## 1.0.2 - 2016-02-10
### Added:
- page templates
- updated base controller
- initial stylesheet ( temp )
- fixed view injection

## 1.0.1 - 2016-02-09
### Added:
- .htaccess
- Base controller
- Index view for Base

## 0.0.1 - 2016-02-03
### Added
- README now contains brief description of the project and list of team members
- CodeIgniter 3.0.4 added as base framework
