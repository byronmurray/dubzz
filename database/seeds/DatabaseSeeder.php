<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Process;
use App\Task;
use App\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	User::truncate();

    	$user = new App\User;
		$user->name = "Byron Murray";
		$user->email = "byron4stacey@hotmail.com";
		$user->role = 'admin';
		$user->password = bcrypt('29killabeez');
		$user->save();



		$process = new App\Process;
		$process->title = "Websites";
		$process->user_id = 1;
		$process->process_id = 0;
		$process->save();

		$process = new App\Process;
		$process->title = "New WordPress Website";
		$process->user_id = 1;
		$process->process_id = 1;
		$process->save();

		$process = new App\Process;
		$process->title = "Website Updates";
		$process->user_id = 1;
		$process->process_id = 1;
		$process->save();

		$process = new App\Process;
		$process->title = "Introduction";
		$process->user_id = 1;
		$process->process_id = 2;
		$process->save();

		$process = new App\Process;
		$process->title = "Planning";
		$process->user_id = 1;
		$process->process_id = 2;
		$process->save();

		$process = new App\Process;
		$process->title = "Design";
		$process->user_id = 1;
		$process->process_id = 2;
		$process->save();

		$process = new App\Process;
		$process->title = "Build";
		$process->user_id = 1;
		$process->process_id = 2;
		$process->save();

		$process = new App\Process;
		$process->title = "Feedback";
		$process->user_id = 1;
		$process->process_id = 2;
		$process->save();

		$process = new App\Process;
		$process->title = "Website Testing";
		$process->user_id = 1;
		$process->process_id = 2;
		$process->save();

		$process = new App\Process;
		$process->title = "Completion";
		$process->user_id = 1;
		$process->process_id = 2;
		$process->save();

		$process = new App\Process;
		$process->title = "Install Plugins";
		$process->user_id = 1;
		$process->process_id = 9;
		$process->save();

		$process = new App\Process;
		$process->title = "SEO";
		$process->user_id = 1;
		$process->process_id = 0;
		$process->save();

		$process = new App\Process;
		$process->title = "Social Media";
		$process->user_id = 1;
		$process->process_id = 0;
		$process->save();

		$process = new App\Process;
		$process->title = "Meetings";
		$process->user_id = 1;
		$process->process_id = 0;
		$process->save();

		$process = new App\Process;
		$process->title = "Cleaning The Office";
		$process->user_id = 1;
		$process->process_id = 0;
		$process->save();


		factory(User::class, 10)->create();
		factory(Task::class, 10)->create();
		factory(Process::class, 10)->create();


		$task = new App\Task;
		$task->title = "Client Meeting";
		$task->user_id = 1;
		$task->body = '<h2>1) Assess the Client&rsquo;s Campaign and Assets</h2>\r\n<p>One of the most critical parts of your onboarding process is assessing your new clients existing campaigns. Understanding what they do and don&rsquo;t have in place should be used to develop a scope of work. The more prospects you work with, the more you&rsquo;ll realize that every&nbsp;client&nbsp;is different. Each one is&nbsp;at a different point in their maturity continuum,&nbsp;and they each have&nbsp;a wide range of assets to work with (or around).&nbsp;&nbsp;</p>\r\n<ul>\r\n<li>Make sure you have all of the access necessary to review their assets.</li>\r\n<li>Make a list of everything you find, both positive and negative, and remember to position the negatives as opportunities for improvement.</li>\r\n<li>When you review your findings, look for opportunities to position yourself as an expert.</li>\r\n</ul>\r\n<h2>2) Build Your Marketing Plan and Campaign Goals</h2>\r\n<p>A successful campaign starts with a goal and a plan. During the sales cycle, you should have identified what the client is hoping to accomplish. The assessment uncovered what they have to work with and what gaps you need to fill. Now, the goal is to move things forward.</p>\r\n<p>This critical onboarding step involves taking the assessment and turning it into quantifiable campaign goals with a plan your team can execute. The better you clarify the purpose of the campaign with your team and the client&rsquo;s team, the more likely you&rsquo;ll stay aligned throughout.</p>\r\n<p>Make sure:</p>\r\n<ul>\r\n<li>The scope of work fits your skill sets. Don&rsquo;t get yourself into something you can&rsquo;t deliver on.</li>\r\n<li>You have an accurate enough data set to establish the necessary baseline for the goals.</li>\r\n<li>You build the goals together. They&rsquo;re worthless without buy-in on both sides.</li>\r\n</ul>\r\n<h2>3) Assign Your Best Team for the Job</h2>\r\n<p>With a firm understanding of what you&rsquo;re up against and how you plan to achieve the established goals, the next step is assigning a&nbsp;team.&nbsp;</p>\r\n<p>At <a href=\"http://www.revenueriver.co/\" target=\"_blank\">Revenue River Marketing</a>, we assign teams of five to every new client. The team consists of a strategist, a coordinator, a search analyst, a designer, and a project Manager. The better our team can relate to our client&rsquo;s team, the smoother the onboarding process will go.</p>\r\n<p>But the most important assignee from an onboarding perspective is the strategist. As the chief point of contact, it&rsquo;s important that the strategist has some commonalities with the client -- if possible. I try to assign the team with the most relevant industry experience and cultural fit first; everything else second. If I&rsquo;m confident that they&rsquo;ll hit it off on a personal note, I&rsquo;m confident that the onboarding process will go smoothly.</p>\r\n<h2>4) Hold an Internal Client Orientation Meeting</h2>\r\n<p>Before your team is involved with the client, you need to brief them on everything that has happened thus far. This meeting is strictly to educate your team on the client, his&nbsp;industry, his&nbsp;products or services, and the scope of work. The team needs to have a thorough understanding of the client\'s goals, and you should prompt them to do a certain amount of prep work for the kickoff call.&nbsp;</p>\r\n<p>You should:</p>\r\n<ul>\r\n<li>Pool together the assessment, contract, and sales meeting notes as a primary handover packet.</li>\r\n<li>Assign specific premium content and blog articles to be read.</li>\r\n<li>Brief your team on everyone on the client&rsquo;s team -- provide&nbsp;LinkedIn profiles and meeting notes.</li>\r\n</ul>\r\n<h2>5) Plan for&nbsp;a Great Kickoff Call</h2>\r\n<p>This is the big first impression, the moment your team and the client&rsquo;s team has been waiting for. It&rsquo;s important for your team to come across as experts. You don&rsquo;t want the client to think you (the owner or business development person) are the only one that knows anything. You team&nbsp;needs to demonstrate their understanding of the job at hand, command their portion of the call, and gather the information they need to move the campaign forward.</p>\r\n<p>Here\'s a sample agenda:</p>\r\n<ol>\r\n<li><strong>Introductions:</strong> 10 minutes</li>\r\n<li><strong>Campaign Objectives:</strong> 10 minutes</li>\r\n<li><strong>Client Overview:</strong> 20 minutes</li>\r\n<li><strong>Campaign Overview:</strong> 10 minutes</li>\r\n<li><strong>Expectations:</strong> 5 minutes</li>\r\n<li><strong>Next Steps:</strong> 5 minutes&nbsp;</li>\r\n</ol>\r\n<h2>6) Do a 30-Day Checkup Call</h2>\r\n<p>This call is designed to be a one-on-one call between myself and the primary decision maker -- I want to talk to the person cutting the checks. Schedule this call to gather feedback on the engagement and relationship so far. It\'s the perfect time to fix it if there is an issue.&nbsp;</p>\r\n<p>I also use the call as an opportunity to&nbsp;strengthen our relationship, extend an invitation to the client to contact me directly with anything of concern, and cement our agency\'s commitment to delivering results. Basically, I want the client to know that I care how the agency is doing, if they are happy with the work, and what else they need in a relationship. &nbsp;</p>\r\n<p>Be sure to:</p>\r\n<ul>\r\n<li>Have questions&nbsp;you want answered prepared before the call.</li>\r\n<li>Recap all activity and production during&nbsp;the first 30 days.</li>\r\n<li>Leave the call with the&nbsp;client&nbsp;understanding how much you value your relationship and his&nbsp;business.</li>\r\n</ul>\r\n<h2>When Onboarding Is Complete</h2>\r\n<p>When I get done with the checkup call, I usually circle back with the strategist to pass on any notes that came up to make sure we&rsquo;re all on the same page. If things are great, I&rsquo;m giving them a high five. If there are issues, the strategist sets a&nbsp;meeting to make corrections.</p>\r\n<p>Once I&rsquo;ve addressed these six elements, I consider the onboarding process complete. It&rsquo;s now time for the team to execute on the campaign, hit the goal, and extend the relationship.</p>';
		$task->save();

		$task = new App\Task;
		$task->title = "Team Meeting";
		$task->user_id = 1;
		$task->body = '<h4 class=\"heading heading-grey-mukta-4\">Identify the team</h4>\r\n<p>The composition of the team may vary based on the size of the practice or the medical specialty. In one setting, the team might include two physicians and their medical assistants, nurses and clinic manager. In another setting the team may be one physician, two nurses and a receptionist. Smaller practices may invite the lab or X-ray technician to team meetings. In larger practices, other relevant staff members, such as a social worker and pharmacist, may be included.</p>\r\n<h4 class=\"heading heading-grey-mukta-4\">Meet regularly and &ldquo;on‑the‑clock&rdquo;</h4>\r\n<p>Pick a set time to meet during the work day, or &ldquo;on‑the‑clock.&rdquo; Many teams meet for one hour every two weeks. You may find that meeting first thing in the morning results in fewer distractions. When possible, the meeting should occur &ldquo;<a class=\"tooltip tooltipstered\">on‑the‑clock</a>&rdquo; and away from the clinical area to minimize interruptions.</p>\r\n<p>&nbsp;</p>\r\n<h4 class=\"heading heading-grey-mukta-4\">Agree on ground rules</h4>\r\n<p>To form a supportive, respectful environment for your team meeting, establish ground rules from the beginning. Creating your own set of ground rules together and agreeing on them as a team will create buy‑in on team meetings and strengthen teamwork. Signing a charter or statement of purpose can help the team connect with the ground rules and their commitment to the group.</p>';
		$task->save();

		$task = new App\Task;
		$task->title = "Proposal";
		$task->user_id = 1;
		$task->body = '<p><strong class=\"whb\">Determine your idea or problem.</strong></p>\r\n<p>Whether you want to write about streamlining operations or reducing costs, figure out what the key issue is. Often, the idea might be clear to you. If, however, you are trying to make a mark or troubleshoot, be observant.</p>\r\n<p>&nbsp;</p>\r\n<p><strong class=\"whb\">Do your research</strong></p>\r\n<p><strong class=\"whb\">.</strong> Before writing a proposal, be sure to check all the facts. Talk to relevant people whether co-workers, managers, or customers. Read about similar companies and see what they do differently.</p>\r\n<ul>\r\n<li>For example, if you think the management should change its caterer, talk first to the kitchen staff. What do they think? Have they worked in other places with different caterers? What do your co-workers think? Maybe your disgruntlement is a matter of personal taste rather than quality.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong class=\"whb\">Write a problem description.</strong></p>\r\n<p>To start your proposal, describe what is happening at present. Include all relevant facts (who is involved, dates, locations). In this part, do not issue judgement; rather, just explain things as they are.</p>\r\n<ul>\r\n<li>For example, you might write &ldquo;Company X has been using Caterer Y for the past seven years. During this time, the number of available entrees has decreased from five to two. The amount of vegetarian-friendly items also has decreased with some days there being none.&rdquo;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong class=\"whb\">Explain your solution.</strong></p>\r\n<p>After identifying the problem, write specifically what you propose to do. Lead with your key point. Show what your findings are based on your research.</p>\r\n<ul>\r\n<li>For example, you might write, &ldquo;I recommend that Company X switch to another caterer. Company X has several other caterer options. Caterer W and Caterer Z both offer larger menus and have comparable costs to our existing provider. Furthermore, because Caterer Z offers daily vegetarian, vegan, and gluten-free entrees, they could better meet the needs of our workforce. Caterer W offers fewer vegan-specific items but also could be a good choice. A survey completed in 2011 showed that 40% of our employees are vegetarian, 10% are vegan, and 2% are gluten-free.&rdquo;</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong class=\"whb\">Outline a plan.</strong></p>\r\n<p>Describe each step and its related implementation times or costs. Be clear with what you know and what remains to be seen. Consider writing numbered steps. Then offer more details. Do not overestimate the value of your change but do suggest what you think the results could be.</p>\r\n<ul>\r\n<li>To switch caterers, we will need: 1. To end our contract with Caterer Y 2. Ask Caterers W and Z for trial tastings 3. Choose one of the firms 4. Sign a contract with the chosen firm. The costs should be comparable to our current costs with Caterer Y. As long as we finish our contract term with Caterer Y, there should be no financial penalties. Furthermore, if our employees like the new food more, their workplace satisfaction is likely</li>\r\n<li></li>\r\n<li></li>\r\n<li>to improve.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p><strong class=\"whb\">State possible objections.</strong></p>\r\n<p>Show your awareness of any possible hitches to your plan. Will there be resistance among employees? For instance, some people might love your current caterer. Could you have to convince a government agency that your new product idea is safe? Talk about steps you would take to convince others of your project.</p>';
		$task->save();


		



     	
    }
}
