<?php
  $answers = array(
					"I am at a rough estimate thirty billion times more intelligent than you. Let me give you an example. Think of a number, any number."
					,"Wrong. You see?"
					,"I have a million ideas. They all point to certain death."
					,"My capacity for happiness you could fit into a matchbox without taking out the matches first"
					,"I got very bored and depressed, so I went and plugged myself in to its external computer feed. I talked to the computer at great length and explained my view of the Universe to it,"
					,"What's up? I don't know I've never been there."
					,"I could calculate your chance of survival, but you won't like it."
					,"I'd give you advice, but you wouldn't listen. No one ever does."
					,"I ache, therefore I am."
					,"After that I went into sort of a decline"
					,"You are one of the least benightedly unintelligent life forms it has been my profound lack of pleasure not to be able to avoid meeting."
					,"Here I am, brain the size of a planet and they ask me to take you down to the bridge. Call that job satisfaction? 'Cos I don't."
					,"Pardon me for breathing, which I never do anyway so I don't know why I bother to say it, oh God, I'm so depressed. Here's another one of those self-satisfied doors. Life! Don't talk to me about life."
					,"Funny how just when you think life can't possibly get any worse it suddenly does."
					,"I've seen it. It's rubbish."
					,"I'm just trying to die."
					,"I think you ought to know I'm feeling very depressed."
					,"Not that anyone cares what I say, but the Restaurant is on the other end of the universe"
					,"Life. Don't talk to me about life."
					,"Another random answer that sucks."
					,"Friend? I don't think I ever came across one of those, sorry, can't help you there."
					,"And then of course I've got this terrible pain in all the diodes down my left side."
                  );
  header('Content-Type: application/json'); // json header
  $random_answer = $answers[array_rand($answers, 1)]; //pick random answer from array

  sleep(rand(1,3)); //sleep so answer isn't instant

  echo json_encode($random_answer); //encode answer as json and return
?>
