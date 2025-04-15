DROP DATABASE IF EXISTS `ontopic`;

CREATE DATABASE `ontopic`;

USE `ontopic`;

CREATE TABLE `users` (
	id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL
);

INSERT INTO `users` (`id`, `email`, `password`, `name`, `age`) VALUES
(1, 'test-user@bitmail.com', 'bitp@ss', 'tester', 20),
(2, 'john@gmail.com', 'pass', 'John', 20),
(3, 'amy@hotmail.com', 'pass1', 'Amy', 23),
(4, 'jay@gmail.com', 'pass2', 'Jay', 18);

CREATE TABLE `blogs` (
    id MEDIUMINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    iduser MEDIUMINT NOT NULL,
    nameuser VARCHAR(100) NOT NULL,
    title VARCHAR(100) NOT NULL,
    content TEXT NOT NULL,
    datecreation DATETIME NOT NULL
);

INSERT INTO `blogs` (`id`, `iduser`, `nameuser`, `title`, `content`, `datecreation`) VALUES
(3, 2, 'John', 'The Future of AI: Beyond the Buzzwords', 'We hear \'AI\' everywhere. But what\'s real? It\'s not just chatbots. It\'s revolutionizing healthcare, transportation, and more. Key areas: machine learning, neural networks, and ethical considerations. Expect rapid advancements, but also critical debates on its impact.', '2025-04-04 11:25:17'),
(4, 2, 'John', 'Simple Budgeting: The 50/30/20 Rule', 'Feeling overwhelmed by budgeting? Try the 50/30/20 rule. 50% goes to needs (rent, groceries), 30% to wants (dining out, entertainment), and 20% to savings or debt repayment. It\'s a straightforward way to manage your money. Start today!', '2025-04-04 11:25:34'),
(5, 2, 'John', 'Mindful Walking: A Simple Stress Reliever', 'Feeling stressed? Try mindful walking. It\'s not just exercise. Focus on your breath, the feeling of your feet on the ground, and the sights and sounds around you. Even 10 minutes can make a difference. It\'s free, accessible, and powerful.', '2025-04-04 11:25:54'),
(6, 2, 'John', 'Finding Inspiration: 3 Quick Prompts', 'Writer\'s block? Try these prompts: 1. A letter to your younger self. 2. A description of a forgotten object. 3. A conversation overheard in a crowded place. Write for 15 minutes on each. Don\'t overthink, just write.', '2025-04-04 11:26:12'),
(7, 2, 'John', 'Small Space, Big Impact: Decluttering Tips', 'Limited space? Declutter! Start with one area. Use the \'one in, one out\' rule. Donate or sell items you don\'t use. Maximize vertical space. Create a sense of calm. Your home will feel bigger and more organized.', '2025-04-04 11:26:31'),
(8, 3, 'Amy', 'The Two-Minute Rule: Conquer Procrastination', 'Procrastinating? Use the two-minute rule. If a task takes less than two minutes, do it immediately. Prevents small tasks from piling up. Build momentum and tackle bigger projects. Small actions, big results.', '2025-04-04 11:27:34'),
(9, 3, 'Amy', 'Book Review: \'Atomic Habits\' by James Clear', 'Clear\'s \'Atomic Habits\' is a game-changer. Focus on small, incremental improvements. 1% better every day. Practical strategies for building good habits and breaking bad ones. Highly recommended for anyone seeking personal growth.', '2025-04-04 11:27:54'),
(10, 3, 'Amy', 'Container Gardening: Fresh Herbs on Your Balcony', 'Limited space? Try container gardening. Grow fresh herbs like basil, mint, and rosemary on your balcony or windowsill. Use well-draining soil and provide ample sunlight. Easy, rewarding, and adds flavor to your cooking.', '2025-04-04 11:28:17'),
(11, 3, 'Amy', 'Golden Hour Photography: Tips for Stunning Shots', 'Capture magical moments during golden hour. The soft, warm light creates stunning photos. Shoot early morning or late afternoon. Use natural light and experiment with shadows. Elevate your photography with this simple technique.', '2025-04-04 11:28:40'),
(12, 3, 'Amy', 'Exploring Your City: Hidden Gems in [Your City Name]', 'Don\'t overlook your own backyard. Discover hidden gems in [Your City Name]. Explore local parks, cafes, and historical sites. Talk to locals for recommendations. Rediscover your city with fresh eyes. Adventure awaits close to home.', '2025-04-04 11:29:11'),
(13, 4, 'Jay', 'Networking: Building Connections That Matter', 'Networking isn\'t just handing out business cards. It\'s building genuine connections. Listen more, talk less. Offer value. Follow up. Focus on quality, not quantity. Build relationships that last.', '2025-04-04 11:30:30'),
(14, 4, 'Jay', 'Email Marketing: Simple Strategies for Engagement', 'Email marketing still works. Personalize your messages. Segment your audience. Offer valuable content. Use a clear call to action. Track your results. Build relationships, not just lists.', '2025-04-04 11:31:00'),
(15, 4, 'Jay', 'Minimalist Decor: Less is More', 'Embrace minimalism for a calming home. Declutter. Choose neutral colors. Invest in quality pieces. Focus on functionality. Create a serene and uncluttered space.', '2025-04-04 11:31:22'),
(16, 4, 'Jay', 'The Power of Active Recall: Study Smarter', 'Stop passively reading. Use active recall. Test yourself. Quiz yourself. Don\'t just review, retrieve. Strengthen memory. Learn more effectively.', '2025-04-04 11:31:43'),
(17, 4, 'Jay', 'Bodyweight Workouts: Fitness Anywhere, Anytime', 'No gym? No problem. Use bodyweight exercises. Squats, push-ups, lunges, planks. Simple, effective. Build strength and endurance anywhere. No equipment needed.', '2025-04-04 11:32:21');