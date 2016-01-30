<div id="app-sidebar" class="advanced">
	<div class="advanced--container">
		<fieldset class="advanced--fieldset">
			<input
					class="advanced--input h2"
					ng-model="properties.summary.value"
					placeholder="<?php p($l->t('Title of the Event'));?>"
					name="title" type="text"
					autofocus="autofocus"
			/>
			<select
					ng-model="calendar"
					ng-init="calendar = oldCalendar || calendars[0]"
					ng-options="c as c.displayname for c in calendars | orderBy:['order'] | calendarSelectorFilter: oldCalendar"></select>
		</fieldset>

		<fieldset class="advanced--fieldset">
			<div class="event-time-interior pull-left">
				<span><?php p($l->t('From')); ?></span>
				<input type="text" name="from" id="from" ng-model="fromdatemodel" class="events--date" placeholder="<?php p($l->t('from'));?>" />
				<input type="text" name="fromtime" id="fromtime" ng-model="fromtimemodel" class="events--time" ng-disabled="properties.allDay" />
			</div>
			<div class="event-time-interior pull-right">
				<span><?php p($l->t('To')); ?></span>
				<input type="text" name="to" id="to" ng-model="todatemodel" class="events--date" placeholder="<?php p($l->t('to'));?>" />
				<input type="text" name="totime" id="totime" ng-model="totimemodel" class="events--time" ng-disabled="properties.allDay" />
			</div>
			<div class="clear-both"></div>
			<div class="advanced--checkbox pull-left">
				<input type="checkbox" name="alldayeventcheckbox"
					   ng-model="properties.allDay"
					   id="alldayeventcheckbox" class="event-checkbox" />
				<label for="alldayeventcheckbox"><?php p($l->t('All day Event'))?></label>
			</div>
		</fieldset>

		<fieldset class="advanced--fieldset">
			<input ng-model="properties.location.value" type="text" class="advanced--input"
				   placeholder="<?php p($l->t('Events Location'));?>" name="location"
				   uib-typeahead="location for location in getLocation($viewValue)"
				   autocomplete="off" />
			<input ng-model="properties.categories.value" type="text" class="advanced--input"
				   placeholder="<?php p($l->t('Separate Categories with comma'));?>" name="categories" />
  			<textarea ng-model="properties.description.value" type="text" class="advanced--input advanced--textarea"
					placeholder="<?php p($l->t('Description'));?>" name="description"></textarea>
		</fieldset>

		<ul class="tabHeaders">
			<li class="tabHeader" ng-repeat="tab in tabs"
				ng-click="tabopener(tab.value)" ng-class="{selected: tab.value == selected}">
				<a href="#">{{tab.title}}</a>
			</li>
		</ul>

		<fieldset class="advanced--fieldset">
			<div ng-include="currentTab"></div>
		</fieldset>

		<fieldset ng-show="eventsattendeeview" class="advanced--fieldset">
			<?php print_unescaped($this->inc('part.eventsattendees')); ?>
		</fieldset>

		<fieldset ng-show="eventsalarmview" class="advanced--fieldset">
			<?php print_unescaped($this->inc('part.eventsalarms')); ?>
		</fieldset>
	</div>

	<div class="advanced--button-area">
		<fieldset>
			<button
				class="events--button button btn delete btn-half pull-left"
				ng-click="delete()"
				ng-show="!is_new">
				<?php p($l->t('Delete')); ?>
			</button>
			<button
				class="evens--button button btn btn-half pull-right"
				ng-click="cancel()"
				ng-show="!is_new">
				<?php p($l->t('Cancel')); ?>
			</button>
			<button
				class="evens--button button btn btn-full"
				ng-click="export()"
				ng-show="!is_new">
				<?php p($l->t('Export')); ?>
			</button>
			<button
				class="events--button button btn primary btn-full"
				ng-click="close('save')"
				ng-show="is_new">
				<?php p($l->t('Create')); ?>
			</button>
			<button
				class="evens--button button btn primary btn-full"
				ng-click="close('save')"
				ng-show="!is_new">
				<?php p($l->t('Update')); ?>
			</button>
		</fieldset>
	</div>
</div>