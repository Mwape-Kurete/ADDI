![addi banner](https://github.com/user-attachments/assets/c26bd979-51f3-406d-afc4-d12260e11604)
 ***
 # Table of Contents: 
- [What is Addi?](#what-is-addi)
- [Tech Stack](#tech-stack)
- [Starting Up](#starting-up)
- [Project Concept](#project-concept)
- [Pages & functionality](#pages-and-functionality)
- [UI Designs](#ui-designs)
  - [Home Page](#home-page)
  - [Ask Around Page](#ask-around-page)
  - [Share Event Page](#share-an-event-page)
  - [Single Post Page](#single-post-page)
  - [Profile Page](#profile-page)
  - [Log In Page](#log-in-page)
  - [Create an Account Page](#create-an-account-page)
- [Build Process](#build-process)
  - [Development Highlights](#development-highlights)
  - [Development Challenges](#development-challenges)
- [Future Implementations](#future-implementations)
- [Demonstration Video](#demonstration-video)
- [License](#license)

***

# What is ADDI?

ADDI is a dynamic Q&A platform designed to bridge the gap between new and upcoming events and curious, outgoing individuals. Whether you’re hosting an event or looking for something exciting in your area, ADDI offers a unique way to connect socially. Users can effortlessly post details about events they or their company are organizing, or inquire about upcoming events nearby. With ADDI, discovering and engaging with events has never been easier.

***
# Tech Stack

<p align="left">
<img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5"/>
<img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3"/>
<img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap"/>
<img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript"/>
<img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP"/>
<img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL"/>
<img src="https://img.shields.io/badge/Figma-F24E1E?style=for-the-badge&logo=figma&logoColor=white" alt="Figma"/>
</p>

*** 
# Starting Up
### Prerequisites

Before you begin, ensure you have the following software installed on your local machine:

- **XAMPP** (for Apache and MySQL)
- **Git** (optional, for cloning the repository)

### Step 1: Clone the Repository

First, clone the repository from GitHub. Open your terminal or Git Bash and run the following command:

   ```bash
   git clone https://github.com/Mwape-Kurete/ADDI.git
  ```
***
# Project Concept 
The goal of ADDI is to establish a dynamic network that brings together event planners, venues, restaurants, bars, and individuals who share a passion for socializing and connecting in shared and third spaces. ADDI enables quick and efficient sharing of events, ensuring they reach the right audience. Additionally, the platform empowers attendees to leave feedback and comments on past events and event planners, fostering a community of engaged and informed participants.

***
# Pages and Functionality

| Page | Functionality  | 
|-----------------|-----------------|
| Home Page | Users can view posted events and post asked on this page, from here they can navigate to a single posted event or ask page to view comments from other users *(access: everyone)* | 
| Profile Page | Users can view the answers and comments they've left, the events and questions they've asked, posts and events they've saved and any pending events or questions *(access: users that have signed in)*| 
| Share an Event Page | Here users can post any upcoming events they are hosting *(access: users that have signed in)* |
| Ask Around Page | Here users can post any questions they have about upcoming or nearby events *(access: users that have signed in)* |
| Single Post Page | Here users will find comments and answers given for specific posts or events after having clicked on a single post or event *(access: users that have signed in)* |
| Log-in Page | Here users can log-in granted they have made an account *(access: users that have signed in)* |
| Create an Account Page | Here users can create an account if they have not made one yet *(access: users that have signed in)* |

***
# UI Designs 
### Home Page
![Home - option B-1](https://github.com/user-attachments/assets/5ffc5667-1490-4dec-84af-614bf87aeaa4)
### Profile Page
![my profile - Saved](https://github.com/user-attachments/assets/0ee65b76-6215-458a-8bc6-4e43ce891e08)
### Share An Event Page 
![Post an Event](https://github.com/user-attachments/assets/3d24b452-0687-407e-acd3-c146d749fc61)
### Ask Around Page 
![Ask Around](https://github.com/user-attachments/assets/ed2d1824-01f1-4ddf-a010-48664e4a77ec)
### Single Post Page 
![Home - option B-2](https://github.com/user-attachments/assets/dbbc8889-8e52-4b1a-b3ad-1d029aea9c7b)
### Log-in Page 
![Sign In](https://github.com/user-attachments/assets/0349d2c6-810b-4974-bef8-8f05df0238fc)
### Create an Account Page
![Sign Up](https://github.com/user-attachments/assets/77bbd052-bb3c-45f3-a14d-72c7ece28dd0)

***
# Build Process 
### Development Highlights: 
- The UI design of this website offers a unique experience that stands out from what users may have encountered before, keeping them engaged.
- The application's design is minimal and straightforward, presenting everything to users in a clear and accessible way, ensuring easy navigation.
- The successful integration of Bootstrap components with custom CSS styling makes the distinctive and minimal design possible.
- The seamless backend functionality enhances the user experience, making it one of the key highlights of the application.

### Development Challenges 
- **Initial PHP Backend Setup:** Setting up the PHP backend correctly was crucial for the functionality of my application. Ensuring everything was configured properly was essential to avoid future issues.
- **Unexpected Errors:** Throughout the development process, XAMPP errors occasionally disrupted my workflow. However, after conducting some research, I was able to resolve the control panel errors, allowing the development to continue successfully.

*** 
# Future implementations
Below are future deliverables this project has to further expand it's functionality and usability: 
- Profile Visits and Following: In the future, I plan to enhance user interactions by enabling features that allow users to follow one another and visit other user profiles.
- Ticket Purchasing: For events that require ticket purchases, I intend to add a feature that allows users to buy tickets seamlessly within the app. This will eliminate the need for users to navigate to external applications, providing a more integrated experience through ADDI.
- Increased Monitoring: Currently, all events and asks are approved by administrators or moderators. In the future, I aim to implement an AI-powered API that can be trained to auto-approve a basic level of events or asks. This would expedite the approval process, allowing events and asks to appear more quickly on users' homepages.

***
# Demonstration Video 
[Watch Demonstration Video](https://drive.google.com/drive/folders/1GiC26jkbLk7HrWivB5qudLVLKGM3pero?usp=sharing) 

*** 
# License 
(MIT) © Mwape Kurete 
