<div
						x-data="{ isOpen: false }"
						x-init="$watch('isOpen', isOpen => { isOpen && $dispatch('onMenuOpen') })"
						>
						<button
							class="menu-button"
							@click="
								isOpen = true;
								$refs.menu.classList.remove('should-close');
								$nextTick(() => $refs.modalCloseButton.focus());
								"
							:class="[isOpen ? 'open' : '']"
							>
							<svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M8.17432 12.4969H40.1743M8.17432 24.4969H40.1743M8.17432 36.4969H22.1743" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</button>
						<div
							class="menu-container"
							x-cloak
							x-show="isOpen"
							>
							<div
								class="menu"
								x-ref="menu"
								:class="[isOpen ? 'should-open' : '']"
								>
								<button
									class="close-button"
									@click="
										$dispatch('onMenuClose');
										$refs.menu.classList.remove('should-open');
										$refs.menu.classList.add('should-close');
										setTimeout(() => {
											isOpen = false;
										}, 1000)
										"
									x-ref="modalCloseButton">
									<svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M12.3052 36.6218L36.3052 12.6218M12.3052 12.6218L36.3052 36.6218" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
									</svg>
								</button>
								<nav>
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'menu_id'        => 'primary-menu-mobile',
									)
								);
								?>
								</nav>
							</div>
							<div
								class="menu-backdrop"
								@click="
									$dispatch('onMenuClose');
									$refs.menu.classList.remove('should-open');
									$refs.menu.classList.add('should-close');
									setTimeout(() => {
										isOpen = false;
									}, 900)
									"
								></div>
						</div>
					</div>
